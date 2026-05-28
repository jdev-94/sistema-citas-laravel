<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    /**
     * Muestra las citas del usuario
     */
    public function index()
    {
        $appointments = Appointment::where('user_id', Auth::id())
            ->with('service')
            ->orderBy('appointment_date', 'asc')
            ->orderBy('appointment_time', 'asc')
            ->get();

        return view('dashboard', compact('appointments'));
    }


    /**
     * Muestra el formulario para crear una nueva cita
     */
    public function create()
    {
        //Traemos todos los servicios que hemos creado usando el Seeder
        $services = Service::all();

        //Retornamos una vista a la que le pasamos los servicios
        return view('appointments.create', compact('services'));
    }

    public function store(Request $request)
    {
        //Validamos los datos del formulario.
        $validated = $request->validate(
            [
                'service_id' => 'required|exists:services,id', //Tiene que existir en la tabla services
                'appointment_date' => 'required|date|after_or_equal:today', //No puede ser en el pasado
                'appointment_time' => 'required'
            ]
        );

        //Guardamos en la base de datos vinculando al usuario logueado
        Appointment::create(
            [
                'user_id' => Auth::id(), //ID del ususario actual de la sesión
                'service_id' => $validated['service_id'],
                'appointment_date' => $validated['appointment_date'],
                'appointment_time' => $validated['appointment_time'],
                'status' => 'pendiente',
            ]
        );

        return redirect()->route('dashboard')->with('success', '¡Tu cita ha sido reservada con éxito!');
    }
}
