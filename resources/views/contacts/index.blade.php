@extends('contacts.template')
@section('css')
    <style>
        .card-footer {
            justify-content: center;
            align-items: center;
            padding: 0.4em;
        }
        .is-info {
            margin: 0.3em;
        }
        select, .is-info {
            margin: 0.3em;
        }
    </style>
@endsection
@section('content')
    @if(session()->has('info'))
        <div class="notification is-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Contacts</p>


            <a class="button is-info" href="{{ route('contacts.create') }}">Créer un contact</a>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Job</th>
                        <th>City</th>
                        <th>Country</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr @if($contact->deleted_at) class="has-background-grey-lighter" @endif>
                            <td><strong>{{ $contact->id }}</strong></td>
                            <td><strong>{{ $contact->name }}</strong></td>
                            <td><strong>{{ $contact->email }}</strong></td>
                            <td><strong>{{ $contact->job_title }}</strong></td>
                            <td><strong>{{ $contact->city->name }}</strong></td>
                            <td><strong>{{ $contact->country->name }}</strong></td>

                            <td>
                                @if($contact->deleted_at)
                                    <form action="{{ route('contacts.restore', $contact->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="button is-primary" type="submit">Restaurer</button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                @if($contact->deleted_at)
                                @else
                                    <div class="field">
                                    <a class="button is-warning" href="{{ route('contacts.edit', $contact->id) }}">Modifier</a>
                                    </div>
                                @endif

                            </td>
                            <td>
                                <form action="{{ route($contact->deleted_at? 'contacts.force.destroy' : 'contacts.destroy', $contact->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button is-danger" type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="card-footer is-centered">
            {{ $contacts->links() }}
        </footer>
    </div>
@endsection
