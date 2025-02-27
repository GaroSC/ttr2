<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenteeRequest;
use App\Http\Requests\MenteeUpdateRequest;
use App\Http\Requests\MentorRequest;
use App\Http\Requests\MentorUpdateRequest;
use App\Models\Msituation;
use App\Models\User;
use Illuminate\Http\Request;

class MenteeController extends Controller
{
    // esta función se encarga de mostrar la lista de mentees.
    public function index(Request $request)
    {
        $filterValue = $request->input('filterValue');

        $menteesFilter = User::role('Mentee')
            ->where('name', 'like', '%' . $filterValue . '%');

        $mentees = $menteesFilter->simplePaginate(10);

        return view('admin.mentees.index', [
            'mentees' => $mentees,
            'filterValue' => $filterValue,
        ]);
    }

    // esta función se encarga de mostrar el formulario para crear un mentee.
    public function create()
    {
        $msituations = Msituation::all();

        return view('admin.mentees.create', compact('msituations'));
    }

    // esta función se encarga de guardar un mentee en la base de datos.
    public function store(MenteeRequest $request) // Usamos el request MentorRequest para validar los datos porque se usan los mismos datos que en el registro de un mentor.
    {
        $mentee = $request->all();
        $user = User::create($mentee);

        $user->roles()->sync(3); // 3 es el id del rol Mentee (ver en la base de datos en la tabla roles).

        return redirect()->action([MenteeController::class, 'index'])
        ->with('success-create', 'Tutorado creado con éxito');
    }

    // esta función se encarga de mostrar un mentee en específico.
    public function show(User $mentee)
    {
        $mentee = User::find($mentee->id);

        return view('admin.mentees.show', compact('mentee'));
    }

    // esta función se encarga de mostrar el formulario para editar un mentee.
    public function edit(User $mentee)
    {
        $msituations = Msituation::all();

        return view('admin.mentees.edit', compact('mentee', 'msituations'));
    }

    // esta función se encarga de actualizar un mentee en la base de datos.
    public function update(MenteeUpdateRequest $request, User $mentee)
    {
        $mentee = User::find($mentee->id);

        if (!$mentee) {
            abort(404, 'Tutorado no encontrado');
        } else {
            $mentee->update([
                'name' => $request->name,
                'id_ipn' => $request->id_ipn,
                'phone' => $request->phone,
                'email' => $request->email,
                'msituation_id' => $request->msituation_id,
            ]);
        }

        return redirect()->action([MenteeController::class, 'index'])->with('success-update', 'Tutorado actualizado con éxito');
    }

    // esta función se encarga de eliminar un mentee de la base de datos.
    public function destroy(User $mentee)
    {
        $mentee->delete();

        return redirect()->action([MenteeController::class, 'index'])
        ->with('success-delete', 'Tutorado eliminado con éxito');
    }

    

}
