<div>

    <div>
        @if (session()->has('message'))
            <div x-data="{ isShow: true }" x-show="isShow" x-init="setTimeout( () => isShow = false, 3000 )" class="inline-flex items-center w-full px-6 py-5 mb-3 text-base text-yellow-700 bg-yellow-100 rounded-lg alert alert-dismissible fade show" role="alert">
                <strong class="mr-1">{{ session('message') }}</strong>
                <button type="button" class="box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 btn-close focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
        เพิ่มข้อมูล
    </button>
    <button wire:click='exportExcel' type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
        Export Excel
    </button>
    <button wire:click='importExcel' type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
        Import Excel
    </button>

    <!-- Create User Modal -->
    <div wire:ignore.self class="fixed top-0 left-0 hidden w-full h-full overflow-x-hidden overflow-y-auto outline-none modal fade" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollable" aria-modal="true" role="dialog">
        <div class="relative w-auto pointer-events-none modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto modal-content bg-clip-padding">
            <div class="flex items-center justify-between flex-shrink-0 p-4 border-b border-gray-200 modal-header rounded-t-md">
              <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalCenteredScrollableLabel">
                เพิ่มข้อมูลผู้ใช้
              </h5>
              <button type="button"
                class="box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 btn-close focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="relative p-4 modal-body">

                 <!-- Create User Form -->
                 <div class="block max-w-md p-6 bg-white rounded-lg shadow-lg">
                    <form novalidate wire:submit.prevent='store'>

                        <div class="mb-6 form-group">
                          <input
                            wire:model='name'
                            type="text" class="form-control
                            block
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
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123"
                            aria-describedby="emailHelp123" placeholder="Full Name">
                            @error('name') <p class="mt-1 text-red-500">{{ $message }}</p> @enderror
                        </div>


                      <div class="mb-6 form-group">
                        <input
                          wire:model='email'
                          type="email" class="form-control block
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
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput125"
                          placeholder="Email address">
                          @error('email') <p class="mt-1 text-red-500">{{ $message }}</p> @enderror
                      </div>
                      <div class="mb-6 form-group">
                        <input
                          wire:model='password'
                          type="password" class="form-control block
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
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput126"
                          placeholder="Password">
                          @error('password') <p class="mt-1 text-red-500">{{ $message }}</p> @enderror
                      </div>

                      <button type="submit" class="
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
                        data-bs-dismiss="modal"
                        >บันทึก</button>
                    </form>
                  </div>
                <!-- Create User Form -->

            </div>

          </div>
        </div>
      </div>
    <!-- Create User Modal -->

    <!-- Edit User Modal -->
     <div wire:ignore.self class="fixed top-0 left-0 hidden w-full h-full overflow-x-hidden overflow-y-auto outline-none modal fade" id="editModalCenter" tabindex="-1" aria-labelledby="exampleModalCenteredScrollable" aria-modal="true" role="dialog">
        <div class="relative w-auto pointer-events-none modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto modal-content bg-clip-padding">
            <div class="flex items-center justify-between flex-shrink-0 p-4 border-b border-gray-200 modal-header rounded-t-md">
              <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalCenteredScrollableLabel">
                แก้ไขข้อมูลผู้ใช้ {{ $name }}
              </h5>
              <button type="button"
                class="box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 btn-close focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="relative p-4 modal-body">

                 <!-- Create User Form -->
                 <div class="block max-w-md p-6 bg-white rounded-lg shadow-lg">
                    <form novalidate wire:submit.prevent='update'>

                        <div class="mb-6 form-group">
                          <input
                            wire:model='name'
                            type="text" class="form-control
                            block
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
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="nameEdit"
                            aria-describedby="emailHelp123" placeholder="Full Name">
                            @error('name') <p class="mt-1 text-red-500">{{ $message }}</p> @enderror
                        </div>


                      <div class="mb-6 form-group">
                        <input
                          wire:model='email'
                          type="email" class="form-control block
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
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="emailEdit"
                          placeholder="Email address">
                          @error('email') <p class="mt-1 text-red-500">{{ $message }}</p> @enderror
                      </div>



                      <button type="submit" class="
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
                        data-bs-dismiss="modal"
                        >บันทึก</button>
                    </form>
                  </div>
                <!-- Edit User Form -->

            </div>

          </div>
        </div>
      </div>
    <!-- Edit User Modal -->

    <div class="flex flex-col mt-4">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full">
                <thead class="bg-white border-b">
                  <tr>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                      #
                    </th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                      ชื่อ สกุล
                    </th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                      อีเมล์
                    </th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                      วันที่สร้าง
                    </th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                      เครื่องมือ
                    </th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($users as $user)
                  <tr class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                        {{ $user->id }}
                    </td>
                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                        {{ $user->name }}
                    </td>
                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                        {{ $user->created_at }}
                    </td>
                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                        <button wire:click="confirmEdit({{$user->id}})" data-bs-target="#editModalCenter" data-bs-toggle="modal" type="button" class="inline-block px-2 pt-2.5 pb-2 bg-blue-600 text-white font-medium text-xs leading-normal uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out align-center">
                            <ion-icon wire:ignore.self name="pencil-outline"></ion-icon>
                        </button>

                        |

                        <button  wire:click="confirmDelete({{$user->id}})" data-bs-target="#deleteModalCenter" data-bs-toggle="modal" type="button" class="inline-block px-2 pt-2.5 pb-2 bg-red-600 text-white font-medium text-xs leading-normal uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out align-center">
                            <ion-icon wire:ignore.self name="trash-outline"></ion-icon>
                        </button>

                    </td>
                  </tr>
                @endforeach

                </tbody>
              </table>

              {{-- <div class="mt-4">
                {{ $users->links() }}
              </div> --}}

          <div class="mt-4">
                {{ $users->onEachSide(5)->links() }}
          </div>

            </div>
          </div>
        </div>
    </div>


    <!-- Delete Dialog -->
    <div wire:ignore.self class="fixed top-0 left-0 hidden w-full h-full overflow-x-hidden overflow-y-auto outline-none modal fade" id="deleteModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
        <div class="relative w-auto pointer-events-none modal-dialog modal-dialog-centered">
          <div class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto modal-content bg-clip-padding">
            <div class="flex items-center justify-between flex-shrink-0 p-4 border-b border-gray-200 modal-header rounded-t-md">
              <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                ยืนยันการลบข้อมูล
              </h5>
              <button type="button"
                class="box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 btn-close focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="relative p-4 modal-body">
              <p>แน่ใจว่าต้องการลบข้อมูลรหัส {{ $deleteId }} นี้?</p>
            </div>
            <div
              class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t border-gray-200 modal-footer rounded-b-md">
              <button type="button"
                class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                data-bs-dismiss="modal">
                ปิด
              </button>
              <button wire:click='delete' type="button"
                data-bs-dismiss="modal"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                ตกลง
              </button>
            </div>
          </div>
        </div>
      </div>

    <!-- Delete Dialog -->

</div>
