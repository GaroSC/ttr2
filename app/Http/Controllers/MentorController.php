<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentorRequest;
use App\Http\Requests\MentorUpdateRequest;
use App\Models\MType;
use App\Models\User;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    // esta función se encarga de mostrar la lista de mentores.
    public function index(Request $request)
    {
        $filterValue = $request->input('filterValue');

        $mentorsFilter = User::role('Mentor')
                            ->where('name', 'like', '%' . $filterValue . '%');

        $mentors = $mentorsFilter->simplePaginate(10);

        return view('admin.mentors.index', [
            'mentors' => $mentors,
            'filterValue' => $filterValue,
        ]);
    }

    // esta función se encarga de mostrar el formulario para crear un mentor.
    public function create()
    {
        $mtypes = MType::all();
        return view('admin.mentors.create', compact('mtypes'));
    }

    // esta función se encarga de guardar un mentor en la base de datos.
    public function store(MentorRequest $request)
    {
        $mentor = $request->all();
        $user = User::create($mentor);

        $user->roles()->sync(2); // 2 es el id del rol Mentor (ver en la base de datos en la tabla roles.

        $user->MTypes()->attach($request->input('mtypes'));

        return redirect()->action([MentorController::class, 'index'])
            ->with('success-create', 'Tutor creado con éxito');
    }

    // esta función se encarga de mostrar un mentor en específico.
    public function show(User $mentor)
    {
        $mentor = User::find($mentor->id);

        $mtypes = $mentor->MTypes()->select('name')->get();

        return view('admin.mentors.show', compact('mentor', 'mtypes'));
    }  

    // esta función se encarga de mostrar el formulario para editar un mentor.
    public function edit(User $mentor)
    {
        $mtypes = MType::all(); 

        $ids_mtypes = $mentor->MTypes()->pluck('mtypes.id');

        return view('admin.mentors.edit', compact('mentor', 'mtypes', 'ids_mtypes'));
    }

    // esta función se encarga de actualizar un mentor en la base de datos.
    public function update(MentorUpdateRequest $request, User $mentor)
    {
        $mentor = User::find($mentor->id);

        if(!$mentor){
            abort(404, 'Tutor no encontrado');
        } else {
            $mentor->update([
                'name' => $request->name,
                'id_ipn' => $request->id_ipn,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);

            $mentor->MTypes()->sync($request->input('mtypes'));
        }

        return redirect()->action([MentorController::class, 'index'])
            ->with('success-update', 'Tutor actualizado con éxito');
    }

    // esta función se encarga de eliminar un mentor de la base de datos.
    public function destroy(User $mentor)
    {
        $mentor->delete();

        return redirect()->action([MentorController::class, 'index'])
            ->with('success-delete', 'Tutor eliminado con éxito');
    }

}
