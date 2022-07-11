<div>


    <div class="mb-6">
        @if (session()->has('message'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                class="inline-flex items-center w-full px-6 py-5 mb-3 text-base text-yellow-700 bg-green-100 rounded-lg alert alert-dismissible fade show"
                role="alert">
                {{ session('message') }}
                <button type="button"
                    class="box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 btn-close focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div>
        <button type="button" data-mdb-ripple="true" data-mdb-ripple-color="light" data-bs-toggle="modal"
            data-bs-target="#exampleModal"
            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Create</button>

    </div>

    <!-- Create Modal -->
    <div wire:ignore.self
        class="fixed top-0 left-0 hidden w-full h-full overflow-x-hidden overflow-y-auto outline-none modal fade"
        id="exampleModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="relative w-auto pointer-events-none modal-dialog">
            <div
                class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto modal-content bg-clip-padding">
                <div
                    class="flex items-center justify-between flex-shrink-0 p-4 border-b border-gray-200 modal-header rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="createModalLabel">Create Product
                    </h5>
                    <button type="button"
                        class="box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 btn-close focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="relative p-4 modal-body">


                    <div class="block max-w-md p-6 bg-white rounded-lg shadow-lg">


                        <form wire:submit.prevent="store" novalidate method="post">
                            @csrf
                            <div class="mb-6 form-group">
                                <div class="mb-3 xl:w-96">
                                    <select wire:model="unit_id"
                                        class="form-select appearance-none
                                  block
                                  w-full
                                  px-3
                                  py-1.5
                                  text-base
                                  font-normal
                                  text-gray-700
                                  bg-white bg-clip-padding bg-no-repeat
                                  border border-solid border-gray-300
                                  rounded
                                  transition
                                  ease-in-out
                                  m-0
                                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        aria-label="Default select example">
                                        <option selected>เลือกหน่วยนับ</option>
                                        @foreach (\App\Models\Unit::all() as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-6 form-group">
                                <input type="text" type="text" wire:model="barcode"
                                    class="form-control
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding
                        border border-red-500
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="barcode" aria-describedby="emailHelp123" placeholder="Barcode">
                                @error('barcode')
                                    <p class="mt-1 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6 form-group">
                                <input type="text" type="text" wire:model="title"
                                    class="form-control
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding
                        border border-red-500
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="title" aria-describedby="emailHelp123" placeholder="title">
                                @error('title')
                                    <p class="mt-1 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="mb-6 form-group">
                                <input type="text" wire:model="price"
                                    class="form-control block
                      w-full
                      px-3
                      py-1.5
                      text-base
                      font-normal
                      text-gray-700
                      bg-white bg-clip-padding
                      border border-solid border-gray-300
                      rounded
                      transition
                      ease-in-out
                      m-0
                      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="price" placeholder="price">
                                @error('price')
                                    <p class="mt-1 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                    <div class="my-4">
                        *
                        <input type="file" wire:model="images" multiple>

                        @error('images.*') <span class="error">{{ $message }}</span> @enderror
                    </div>

                            <button
                            disabled
                            wire:loading.attr='disabled'
                            wire:target='images'
                            type="submit"
                            class="
                    w-full
                    px-6
                    py-2.5
                    bg-blue-600
                    text-white
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    rounded
                    shadow-md
                    hover:bg-blue-700 hover:shadow-lg
                    focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                    active:bg-blue-800 active:shadow-lg
                    transition
                    duration-150
                    ease-in-out"
                                data-bs-dismiss="modal">Save ...</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div wire:init='initLoading'>
        @if ($isLoading)
            <table class="min-w-full mt-6">
                <thead class="bg-white border-b">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-left text-gray-900 text-s">
                            #
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                            Barcode
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                            Unit Name
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                            Images
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-gray-100 border-b" wire:key="{{ $product->id }}">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                {{ $product->id }}
                            </td>
                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                {{ $product->barcode }}
                            </td>
                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                {{ $product->title }}
                            </td>
                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                {{ $product->price }}
                            </td>
                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                {{ $product->unit->name }}
                            </td>
                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                @foreach ($product->photos as $photo)
                                    <div>
                                        <a href="{{ asset('storage/product-image/'.$photo) }}" target="_blank">{{ $photo }}</a>
                                    </div>
                                @endforeach
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>

            <div class="mt-6">
                {{ $products->links() ?? '' }}
            </div>
        @else
            <div class="flex items-center justify-center">
                <div class="inline-block w-8 h-8 border-4 rounded-full spinner-border animate-spin" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        @endif
    </div>




</div>
