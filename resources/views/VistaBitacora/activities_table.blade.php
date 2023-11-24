

<table class="min-w-full bg-white">
    <thead>
        <tr>
            <th class="py-2 px-4 border-b">Id</th>
            <th class="py-2 px-4 border-b">Nombre</th>
            <th class="py-2 px-4 border-b">Actividad</th>
            <th class="py-2 px-4 border-b">Fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach($activities as $activity)
            <tr>
                <td class="py-2 px-4 border-b text-center">{{ $activity->id }}</td>
                <td class="py-2 px-4 border-b text-center">
                    @if($activity->causer)
                        {{ $activity->causer->name }}
                    @else
                        Usuario no disponible
                    @endif
                </td>
                <td class="py-2 px-4 border-b text-center">{{ $activity->description }}</td>
                <td class="py-2 px-4 border-b text-center">{{ $activity->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
