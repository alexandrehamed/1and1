
            <div class="panel panel-default">
                <div class="panel-body">
                <h2>Ajouter un nouveau message</h2>
                <form action="{{ route('messages.update', $thread->id) }}" method="post">
                    {{ method_field('put') }}
                    {{ csrf_field() }}

                    <!-- Message Form Input -->
                    <div class="form-group">
                        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                    </div>

                    @if($users->count() > 0)
                        <div class="checkbox">
                            @foreach($users as $user)
                                <label title="{{ $user->name }}">
                                    <input type="checkbox"  name="recipients[]" value="{{ $user->id }}">{{ $user->name }}
                                </label>
                            @endforeach
                        </div>
                    @endif

                    <!-- Submit Form Input -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Envoyer</button>
                    </div>
                </form>
                </div>
            </div>
