@extends('layouts.dashboard')

@section('title', 'Panel Modérateur - Scène&Co')
@section('header_title', 'Administration & Modération')

@section('content')
<div class="max-w-7xl mx-auto space-y-8">
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3">
            <span>✅</span> {{ session('success') }}
        </div>
    @endif

    <!-- Section Validation Troupes -->
    <div class="bg-white rounded-3xl shadow-sm border border-zinc-100 overflow-hidden">
        <div class="p-6 border-b border-zinc-100">
            <h3 class="text-xl font-bold font-serif">Troupes en attente de validation</h3>
            <p class="text-zinc-500 text-sm">Ces compagnies ne peuvent pas encore accéder à leur dashboard.</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-zinc-50 text-zinc-500 text-xs font-black uppercase tracking-widest">
                    <tr>
                        <th class="px-6 py-4">Nom / Compagnie</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Date d'inscription</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100">
                    @forelse($pendingTroupes as $troupe)
                    <tr class="hover:bg-zinc-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-bold text-zinc-900">{{ $troupe->name }}</div>
                            <div class="text-xs text-zinc-400 italic">Troupe de théâtre</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-zinc-600">{{ $troupe->email }}</td>
                        <td class="px-6 py-4 text-sm text-zinc-500">{{ $troupe->created_at->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <form action="{{ route('admin.validate-troupe', $troupe->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl text-xs font-bold transition-all">Valider</button>
                                </form>
                                <form action="{{ route('admin.reject-troupe', $troupe->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-zinc-100 hover:bg-zinc-200 text-zinc-600 px-4 py-2 rounded-xl text-xs font-bold transition-all">Refuser</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-zinc-400 italic font-medium">Aucune troupe en attente.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Section Modération Événements -->
    <div class="bg-white rounded-3xl shadow-sm border border-zinc-100 overflow-hidden">
        <div class="p-6 border-b border-zinc-100">
            <h3 class="text-xl font-bold font-serif">Spectacles en attente de publication</h3>
            <p class="text-zinc-500 text-sm">Événements créés par les troupes nécessitant votre accord.</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-zinc-50 text-zinc-500 text-xs font-black uppercase tracking-widest">
                    <tr>
                        <th class="px-6 py-4">Spectacle</th>
                        <th class="px-6 py-4">Par la troupe</th>
                        <th class="px-6 py-4">Date prévue</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100">
                    @forelse($pendingEvents as $event)
                    <tr class="hover:bg-zinc-50 transition-colors">
                        <td class="px-6 py-4 font-bold text-zinc-900">{{ $event->title }}</td>
                        <td class="px-6 py-4 text-sm text-zinc-600">{{ $event->user ? $event->user->name : 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-zinc-500">{{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <form action="{{ route('admin.approve-event', $event->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-theatre-red hover:bg-red-800 text-white px-4 py-2 rounded-xl text-xs font-bold transition-all">Publier</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-zinc-400 italic font-medium">Aucun événement à modérer.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
