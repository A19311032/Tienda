<?php

namespace App\Http\Controllers;
use App\Models\Venta;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index()
    {
        $ventas = Venta::all(); 
        $ventas = Venta::orderBy('id', 'desc')->paginate(10);
        return view('ventas.index', compact('ventas'));
    }

    public function edit($id)
    {
        $venta = Venta::find($id);
        
        if (!$venta) {
            return redirect()->route('ventas.index')->with('error', 'Venta no encontrado');
        }
    
        return view('ventas.edit', compact('venta'));
    }
    
    
    public function mostrarFormulario()
    {
        return view('ventas.create');
    }

    public function crearVenta(Request $request)
    {
        $messages = [
            'marca.required' => 'El campo Marca es obligatorio.',
            'silueta.required' => 'El campo Silueta es obligatorio.',
            'modelo.required' => 'El campo Modelo es obligatorio.',
            'talla.required' => 'El campo Talla es obligatorio.',
            'estado.required' => 'El campo Estado es obligatorio.',
            'condicion.required' => 'El campo Condición es obligatorio.',
            'cantidad.required' => 'El campo Cantidad es obligatorio.',
            'imagen.required' => 'El campo Imagen es obligatorio.',
            'descripcion.required' => 'El campo Descripción es obligatorio.',
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'La imagen debe ser un archivo de tipo: jpeg, png, jpg, gif, svg.',
            'imagen.max' => 'La imagen no debe ser mayor a 2048 kilobytes.',
            'precio.required' => 'El campo Imagen es obligatorio.',

            
            // ... puedes agregar más mensajes personalizados aquí
        ];
    
        $validated = $request->validate([
            'marca' => 'required|string|max:255',
            'silueta' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'talla' => 'required|numeric', 
            'estado' => 'required|string|max:255',
            'condicion' => 'required|string|max:255',
            'cantidad' => 'required|numeric', 
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric', 
        ], $messages);
    
        // Creación del objeto Venta
        $venta = new Venta; 
        $venta->marca = $request->marca;
        $venta->silueta = $request->silueta;
        $venta->modelo = $request->modelo;
        $venta->talla = $request->talla;
        $venta->estado = $request->estado;
        $venta->condicion = $request->condicion;
        $venta->cantidad = $request->cantidad;
        $venta->descripcion = $request->descripcion;
        $venta->precio = $request->precio;

    
        // Manejo de la carga de la imagen
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $venta->imagen = $name; // Asumiendo que tienes una columna 'imagen'
        }
    
        $venta->save();
    
        return redirect()->route('ventas.index')->with('success', 'Venta creado con éxito.');
    }
    
    public function update(Request $request, $id)
    {
        // Validación de datos (esto es un ejemplo básico, puedes agregar más reglas según lo necesites)
        $request->validate([
            'marca' => 'required|string|max:255',
            'silueta' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'talla' => 'required|numeric', 
            'estado' => 'required|in:Nuevo,Usado',
            'condicion' => 'required|in:Noventa,Ochenta,Setenta',
            'cantidad' => 'required|numeric', 
            'descripcion' => 'required|string|max:255',            
            'precio' => 'required|numeric', 

        ]);

        // Busca el venta por ID
        $venta = Venta::find($id);

        // Si el venta no se encuentra, redirige con un mensaje de error (puedes manejar esto de diferentes maneras)
        if (!$venta) {
            return redirect()->route('ventas.index')->with('error', 'Venta no encontrado.');
        }

        // Actualiza el venta con los datos del formulario
        $venta->update([
            'marca' => $request->marca,
            'silueta' => $request->silueta,
            'modelo' => $request->modelo,
            'talla' => $request->talla,
            'estado' => $request->estado,
            'condicion' => $request->condicion,
            'cantidad' => $request->cantidad,
            'imagen' => $request->imagen,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,

        ]);


        // Redirige de vuelta a la página de lista o a donde prefieras con un mensaje de éxito
        return redirect()->route('ventas.index')->with('success', 'Venta actualizado con éxito.');
    }

    
    public function buscar(Request $request) {
        $busqueda = $request->get('busqueda');
    
        $ventas = Venta::where('marca', 'LIKE', "%$busqueda%")
                             ->orWhere('silueta', 'LIKE', "%$busqueda%")
                             ->orWhere('modelo', 'LIKE', "%$busqueda%")
                             ->orWhere('talla', 'LIKE', "%$busqueda%")
                             ->orWhere('estado', 'LIKE', "%$busqueda%")
                             ->orWhere('precio', 'LIKE', "%$busqueda%")
                             ->paginate(10);
    
        return view('ventas.index', compact('ventas'));
    }

    public function eliminar($id)
    {
        $venta = Venta::find($id);

        if (!$venta) {
            return redirect()->route('ventas.index')->with('error', 'Venta no encontrada.');
        }

        $venta->delete();

        return redirect()->route('ventas.index')->with('success', 'Venta eliminada con éxito.');
    }

    
}
