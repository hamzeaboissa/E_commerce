    <!-- add -->
    <div wire:ignore.self class="modal fade" id="addbrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">add brands</h1>
                    <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="storebrand">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>select category</label>
                            <select wire:model.defer="category_id" required class="form-control">
                                <option value="">--select category--</option>
                                @foreach ($categories as $categItem)
                                    <option value="{{ $categItem->id }}">{{ $categItem->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Brand name</label>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb3">
                            <label>Brand slug</label>
                            <input type="text" wire:model.defer="slug" class="form-control">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb3">
                            <label>status</label><br />
                            <input type="checkbox" wire:model.defer="status" /> checked=hidden , unchecked=visible
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- edit -->
    <div wire:ignore.self class="modal fade" id="updatebrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">update brands</h1>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div wire:loading class="p-2">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>Loading...
                </div>
                <div wire:loading.remove>
                    <form wire:submit.prevent="updatebrand">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>select category</label>
                                <select wire:model.defer="category_id" required class="form-control">
                                    <option value="">--select category--</option>
                                    @foreach ($categories as $categItem)
                                        <option value="{{ $categItem->id }}">{{ $categItem->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb3">
                                <label>Brand name</label>
                                <input type="text" wire:model.defer="name" class="form-control">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb3">
                                <label>Brand slug</label>
                                <input type="text" wire:model.defer="slug" class="form-control">
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb3">
                                <label>status</label><br />
                                <input type="checkbox" wire:model.defer="status" style="width:70px;height=70px;" />
                                checked=hidden , unchecked=visible
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" wire:click="closeModal" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit -->
    <div wire:ignore.self class="modal fade" id="deletebrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">delet brand</h1>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div wire:loading class="p-2">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>Loading...
                </div>
                <div wire:loading.remove>
                    <form wire:submit.prevent="destroybrand">
                        <div class="modal-body">
                            <h4>are you sure want to delete?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" wire:click="closeModal" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">yes delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
