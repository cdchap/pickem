@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center min-h-screen font-mono">

        <x-login-menu />

        <div class="flex flex-col items-center justify-center py-24 px-4">
            <div class="text-center px-16 py-12 border-2 border-black shadow-black">
                <h1 class="text-4xl md:text-6xl font-sans font-black text-black border-b-4 border-red-600">College
                    Football</h1>
                <h2 class="mt-4 text-lg md:text-2xl text-gray-500">Bowl 🏈 Confidence 🏈 Pool</h2>
                <h2 class="mt-4 text-xl md:text-2xl text-gray-500">🎉 🎉 🎉</h2>
                <div class="mt-8 flex flex-col justify-center items-center">
                    @guest
                        <span class="inline-flex rounded-md shadow-sm">
                            <button type="button"
                                class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition ease-in-out duration-150">
                                Request Invitation
                            </button>
                        </span>
                    @endguest

                    @auth
                        @can('make picks')
                            <div class="max-w-sm">
                                <h3 class="font-sans text-xl text-gray-900">Welcome <a
                                        class="font-mono text-blue-600 underline hover:text-blue-400"
                                        href="#">&#64;{{ auth()->user()->username }}</a>!! First thing's first&hellip;click the button below to make your selections
                                </h3>
                            </div>
                            
                            <a href="{{ route('pick-form') }}">
                                <span class="inline-flex rounded-md shadow-sm mt-4">
                                    <button type="button"
                                        class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition ease-in-out duration-150">
                                        Pick Your Winners
                                    </button>
                                </span>
                            </a>
                        @else
                            <h3 class="font-sans text-xl text-gray-900">Welcome <a
                                    class="font-mono text-blue-600 underline hover:text-blue-400"
                                    href="#">&#64;{{ auth()->user()->username }}</a>!!
                            </h3>
                        @endcan
                    @endauth
                </div>
            </div>
            
            
        </div>
        <div class="min-h-screen bg-card-image bg-center bg-cover bg-opacity-25 flex flex-col items-center justify-center text-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-1 xl:grid-cols-2 gap-4">
               <div class="flex flex-col">
                   <div>
                      <a href="#">Leader Board<span class="font-sans">&nearrow;</span></a>
                   </div>
                   <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                       <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                           <div class="shadow-black overflow-hidden">
                               <table class="min-w-full divide-y divide-black border-2 border-black">
                                   <thead>
                                       <tr>
                                           <th
                                               class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium font-sans text-gray-500 uppercase tracking-wider">
                                               Username
                                           </th>
                                           <th
                                               class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium font-sans text-gray-500 uppercase tracking-wider">
                                               Title
                                           </th>
                                       </tr>
                                   </thead>
                                   <tbody class="bg-white divide-y divide-black">
                                       <tr>
                                           <td class="px-6 py-4 whitespace-no-wrap">
                                               <div class="flex items-center">
                                                   <div class="flex-shrink-0 h-10 w-10">
                                                       <img class="h-10 w-10 rounded-full"
                                                           src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60"
                                                           alt="">
                                                   </div>
                                                   <div class="ml-4">
                                                       <div class="text-sm leading-5 font-medium text-gray-900">
                                                           Jane Cooper
                                                       </div>
                                                       <div class="text-sm leading-5 text-gray-500">
                                                           jane.cooper@example.com
                                                       </div>
                                                   </div>
                                               </div>
                                           </td>
                                           <td class="px-6 py-4 whitespace-no-wrap">
                                               <div class="text-sm leading-5 text-gray-900">Regional Paradigm Technician
                                               </div>
                                               <div class="text-sm leading-5 text-gray-500">Optimization</div>
                                           </td>
                                       </tr>

                                       <!-- More rows... -->
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="flex flex-col">
                   <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                       <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                           <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                               <table class="min-w-full divide-y divide-gray-200">
                                   <thead>
                                       <tr>
                                           <th
                                               class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                               Name
                                           </th>
                                           <th
                                               class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                               Title
                                           </th>
                                       </tr>
                                   </thead>
                                   <tbody class="bg-white divide-y divide-gray-200">
                                       <tr>
                                           <td class="px-6 py-4 whitespace-no-wrap">
                                               <div class="flex items-center">
                                                   <div class="flex-shrink-0 h-10 w-10">
                                                       <img class="h-10 w-10 rounded-full"
                                                           src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60"
                                                           alt="">
                                                   </div>
                                                   <div class="ml-4">
                                                       <div class="text-sm leading-5 font-medium text-gray-900">
                                                           Jane Cooper
                                                       </div>
                                                       <div class="text-sm leading-5 text-gray-500">
                                                           jane.cooper@example.com
                                                       </div>
                                                   </div>
                                               </div>
                                           </td>
                                           <td class="px-6 py-4 whitespace-no-wrap">
                                               <div class="text-sm leading-5 text-gray-900">Regional Paradigm Technician
                                               </div>
                                               <div class="text-sm leading-5 text-gray-500">Optimization</div>
                                           </td>
                                       </tr>

                                       <!-- More rows... -->
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
        <div>
             <livewire:bowl.bowl-list /> 
        </div>
        <div class="mt-16 bg-black bg-contain bg-center h-screen text-white prose-2xl flex flex-col justify-center items-center">
            // Something here that is intereseting
        </div>
    </div>

@endsection
