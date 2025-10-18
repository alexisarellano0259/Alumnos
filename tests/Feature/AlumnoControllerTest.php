<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Alumno;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlumnoControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function se_listan_los_alumnos()
    {
        Alumno::factory()->count(2)->create();

        $response = $this->get('/alumnos');
        $response->assertStatus(200);
        $response->assertSeeText('Listado de Alumnos');
    }

    /** @test */
    public function se_muestra_formulario_de_creacion()
    {
        $response = $this->get('/alumnos/create');
        $response->assertStatus(200);
        $response->assertSee('Agregar Alumno');
    }

    /** @test */
    public function se_puede_crear_un_alumno()
    {
        $data = Alumno::factory()->make()->toArray();
        $response = $this->post('/alumnos', $data);
        $response->assertRedirect('/alumnos');
        $this->assertDatabaseHas('alumnos', ['correo' => $data['correo']]);
    }

    /** @test */
    public function se_muestra_formulario_de_edicion()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->get("/alumnos/{$alumno->id}/edit");
        $response->assertStatus(200);
        $response->assertSee('Editar Alumno');
    }

    /** @test */
    public function se_puede_eliminar_un_alumno()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->delete("/alumnos/{$alumno->id}");
        $response->assertRedirect('/alumnos');
        $this->assertDatabaseMissing('alumnos', ['id' => $alumno->id]);
    }
}
