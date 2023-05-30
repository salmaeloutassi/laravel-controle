@extends('Layouts.app')
@section('title', 'Edit Data User')
@section('content')



<a href="{{ route('createEventPage') }}"  class= "space-x-6 text-gray-900 mt-16 bg-white hover:bg-gray-100 border  font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 mr-2 mb-2">
    <img src="https://cdn-icons-png.flaticon.com/256/2312/2312340.png" width="30px" height="30px">
    Add New Event
</a>
  
<div class="flex justify-center  mt-12">
    
    <div class=" overflow-x-auto w-[70%] ">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    id
                </th>
                <th scope="col" class="px-6 py-3">
                    event title
                </th>
                <th scope="col" class="px-6 py-3">
                    description
                </th>
                
                <th scope="col" class="px-6 py-3">
                    date de debut
                </th>
                <th scope="col" class="px-6 py-3">
                   date de fin
                </th>
                <th scope="col" class="px-6 py-3">
                    price
                 </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $event->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $event->title }}
                </td>
                <td class="px-6 py-4">
                    {{ $event->description }}
                </td>
                <td class="px-6 py-4">
                    {{ $event->start_date }}
                </td>
                <td class="px-6 py-4">
                    {{ $event->end_date }}
                </td>
                <td class="px-6 py-4">
                    {{ $event->price }}
                </td>
                
                <td class=" flex px-6 py-4 space-x-8">
                    <a href="{{ route('editEventPage',$event->id) }}" class="font-medium  text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                   
                    <div x-data="{ showModal: false }">
                        <!-- Button to open the modal -->
                        <!-- Modal overlay -->
                        <form action="{{ route('delete_event', $event->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <a href="#" onclick="toggleModal('modal-id{{ $event->id }}')" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delet</a>
                            <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                                id="modal-id{{ $event->id }}">
                                <div class="relative w-auto my-6 mx-auto max-w-3xl">
                                    <!--content-->
                                    <div
                                        class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                        <!--header-->
                                        <div
                                            class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                                            <h3 class="text-3xl font-semibold">
                                               Supprimer l'Evenement
                                            </h3>
                                            <button
                                                class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                                onclick="toggleModal('modal-id{{ $event->id }}')">
                                                <span
                                                    class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                                    ×
                                                </span>
                                            </button>
                                        </div>
                                        <!--body-->
                                        <div class="relative p-6 flex-auto">
                                            <p class="my-4 text-slate-500 text-lg leading-relaxed">
                                                confirmation de la suppression
                                            </p>
                                        </div>
                                        <!--footer-->
                                        <div
                                            class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                                            <button
                                                class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                type="button"
                                                onclick="toggleModal('modal-id{{ $event->id }}')">
                                                Close
                                            </button>
                                            <button
                                                class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                type="submit"
                                                onclick="toggleModal('modal-id{{ $event->id }}')">
                                                confirmer de la suppression
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop">
                            </div>
                            <script type="text/javascript">
                                function toggleModal(modalID) {
                                    document.getElementById(modalID).classList.toggle("hidden");
                                    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
                                    document.getElementById(modalID).classList.toggle("flex");
                                    document.getElementById(modalID + "-backdrop").classList.toggle("flex");
                                }
                            </script>
                        </form>
                    </div>
                    
                    
                    
                </td>
            </tr>
            
            
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection