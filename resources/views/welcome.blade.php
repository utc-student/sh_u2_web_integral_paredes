<x-app-layout>
   
    
    <x-container>
        
          
                <!-- Contenido de la vista -->
                <div class="dashboard">
                    <div class="card">
                        <div class="icon">👩‍🎓</div>
                        <div class="content">
                            <div class="number" id="studentsCount">0</div>
                            <div class="label">Alumnos Registrados</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">📚</div>
                        <div class="content">
                            <div class="number" id="coursesCount">0</div>
                            <div class="label">Cursos Existentes</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">👨‍🏫</div>
                        <div class="content">
                            <div class="number" id="teachersCount">0</div>
                            <div class="label">Profesores</div>
                            <div>
                            <!-- Contenedor del mapa -->
                            <h1>nuestra ubicación</h1>
                        </div>
            <div id="map"></div>
        </div>
                       
    </x-container>
    <!-- Incluye el JS personalizado -->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="{{ asset('css/map.css') }}">


    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/map.js') }}" defer></script>

     <!-- Incluir Leaflet -->
     
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
     
</x-app-layout>
