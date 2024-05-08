    <div>
        @include('livewire.admin.brand.model-form')
        <div class="row">
            <div class="clo-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            brand list
                            <a href="#" data-bs-toggle="modal" data-bs-target="#addbrandModal"
                                class="btn btn-primary btn-sm float-end">Add brands</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>category</th>
                                    <th>name</th>
                                    <th>slug</th>
                                    <th>status</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->id }}</td>
                                        <td>
                                            @if ($brand->category)
                                                {{ $brand->category->name }}
                                            @else
                                                no category
                                            @endif
                                        </td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->slug }}</td>
                                        <td>{{ $brand->status == '1' ? 'hidden' : 'visible' }}</td>
                                        <td>
                                            <a href="#" wire:click="editbrand({{ $brand->id }})"
                                                data-bs-toggle="modal" data-bs-target="#updatebrandModal"
                                                class="btn btn-sm btn-success">edit</a>
                                            <a href="#" wire:click="deletebrand({{ $brand->id }})"
                                                data-bs-toggle="modal" data-bs-target="#deletebrandModal"
                                                class="btn btn-sm btn-danger">delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No brands added</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $brands->links() }}
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            window.addEventListener('close-modal', event => {
                $('#addbrandModal').modal('hide');
                $('#updatebrandModal').modal('hide');
                $('#deletebrandModal').modal('hide');
            });
        </script>
    @endpush
