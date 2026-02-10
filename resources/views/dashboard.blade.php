<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Auth::user()->role === 'admin')
                <script>
                    window.location.href = "{{ route('courses.index') }}";
                </script>
            @elseif(Auth::user()->role === 'student')
                @include('student')
            @elseif(Auth::user()->role === 'instractor')
                @include('instructor')
            @endif
        </div>
    </div>
</x-app-layout>
