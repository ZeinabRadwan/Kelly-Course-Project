<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-bold text-gray-900">Your Certificates</h2>
    </x-slot>

    <div class="py-8 bg-gray-50">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 shadow-lg rounded-lg border-t-4 border-blue-600">
                <div class="space-y-8">
                    @if ($certificates->isEmpty())
                        <p class="text-center text-xl text-gray-600">You haven't earned any certificates yet.</p>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($certificates as $certificate)
                                <div class="certificate-card bg-gray-100 p-6 rounded-lg shadow-md">
                                    <h3 class="text-2xl font-semibold">{{ $certificate->course->title }}</h3>
                                    <p class="text-sm text-gray-600">Successfully completed on {{ $certificate->created_at->format('F j, Y') }}</p>
                                    <a href="{{ route('certificates.show', $certificate) }}" class="mt-4 text-blue-600">View Certificate</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
