<div>
    <x-slot name="title">User - Document</x-slot>
    <div class="container my-3">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if ($showTable == true)
            <div class="card my-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="page-title">Documents</h1>
                        <style>.page-title
                            {
                                text-decoration: underline;
                                font-size: 2.5rem;
                                font-weight: bold;
                                margin-top: 1rem;
                                text-align: left;
                            }</style>
                        <button class="btn btn-success" wire:click='showForm'>
                            <span wire:loading.remove wire:target='showForm'>New Document</span>
                            <span wire:loading wire:target='showForm'>New Document....</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        @if ($showTable == true)
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Department</th>
                                    <th>User</th>
                                    <th>Document</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($documents as $document)
                                    <tr>
                                        <td>{{ $document->id }}</td>
                                        <td>{{ $document->title }}</td>
                                        <td>{{ $document->date  }}</td>
                                        <td>{{ $document->department }}</td>
                                        <td>{{ $document->users->name . ' ' }}</td>
                                        <td>{{ $document->document }}</td>
                                        <td><button wire:click='edit({{ $document->id }})'
                                                class="btn btn-primary">Edit</button></td>
                                        <td><button wire:click='delete({{ $document->id }})'
                                                class="btn btn-danger">Delete</button></td>
                                        <td>{{ $document->remark }}</td>
                                    </tr>
                                @empty
                                    <h4>Document Not Found</h4>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $documents->links('custom-pagination-links-view') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($createForm == true)
            <div class="container">
                <h1 class="page-title">Create New Documents</h1>
                        <style>.page-title
                            {
                                text-decoration: underline;
                                font-size: 2rem;
                                font-weight: bold;
                                margin-top: 1rem;
                                text-align: left;
                            }</style>
                <form wire:submit.prevent='create'>
                    <div class="form-group my-1"><br>
                        <label for="">Enter Title</label>
                        <input type="text" wire:model='title' class="form-control"><br>
                        
                        <label for="date-input">Select a Date:</label>
                        <input type="date" wire:model="date" class="form-control"><br>

                        <label for="department-select">Select a Department:</label>
                        <select id="department-select" wire:model="department" class="form-control">
                        <option value="account">Account DIV</option>
                        <option value="construction">Construction DIV</option>
                        <option value="birth & death">Birth & Death DIV</option>
                        <option value="water">Water DIV</option>
                        </select><br>

                        <label for="remark-input">Remark:</label>
                        <input type="text" wire:model="remark" class="form-control"><br>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group my-1">
                        <label for="">Upload Document</label>
                        <input type="file" wire:model='document' class="form-control">
                        @error('document')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type='submit' class="btn btn-success">Save Document</button>
                </form>
            </div>
        @endif

        @if ($updateForm == true)
            <div class="container">
                <h1 class="page-title">Update Documents</h1>
                        <style>.page-title
                            {
                                text-decoration: underline;
                                font-size: 2rem;
                                font-weight: bold;
                                margin-top: 1rem;
                                text-align: left;
                            }</style>
                <form wire:submit.prevent='update({{ $edit_id }})'>
                    <div class="form-group my-1"><br>
                        <label for="">Enter Title</label>
                        <input type="text" wire:model='edit_title' class="form-control"><br>

                        <label for="date-input">Select a Date:</label>
                        <input type="date" wire:model="date" class="form-control"><br>

                        <label for="department-select">Select a Department:</label>
                        <select id="department-select" wire:model="department" class="form-control">
                        <option value="account">Account DIV</option>
                        <option value="construction">Construction DIV</option>
                        <option value="birth & death">Birth & Death DIV</option>
                        <option value="water">Water DIV</option>
                        </select><br>

                        <label for="remark-input">Remark:</label>
                        <input type="text" wire:model="remark" class="form-control"><br>

                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group my-1">
                        <label for="">Upload Document</label>
                        <input type="file" wire:model='new_document' class="form-control">
                        <input type="hidden" wire:model='old_document' class="form-control"><br>
                        @if ($new_document)
                            <span>{{ $new_document }}</span>
                        @else
                            <span>{{ $old_document }}</span>
                        @endif
                        @error('document')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>                    <button type='submit' class="btn btn-success">Update Document</button>
                </form>
            </div>
        @endif
    </div>
</div>
