
<div>
    @section('pageTitle', 'Dashboard')
   <div>
       <h3 class="text-lg leading-6 font-medium text-gray-900">
           Totals
       </h3>
       <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
           <div class="bg-white overflow-hidden shadow rounded-lg">
               <div class="px-4 py-5 sm:p-6">
                   <dl>
                       <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                           Total Subscribers
                       </dt>
                       <dd class="mt-1 text-3xl leading-9 font-semibold text-gray-900">
                           {{$users->count()}}
                       </dd>
                   </dl>
               </div>
           </div>
           <div class="bg-white overflow-hidden shadow rounded-lg">
               <div class="px-4 py-5 sm:p-6">
                   <dl>
                       <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                           Invitations to approve
                       </dt>
                       <dd class="mt-1 text-3xl leading-9 font-semibold text-gray-900">
                           {{$invitationsCount}}
                       </dd>
                   </dl>
               </div>
           </div>
           <div class="bg-white overflow-hidden shadow rounded-lg">
               <div class="px-4 py-5 sm:p-6">
                   <dl>
                       <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                           Some other metric
                       </dt>
                       <dd class="mt-1 text-3xl leading-9 font-semibold text-gray-900">
                           100%
                       </dd>
                   </dl>
               </div>
           </div>
       </div>
   </div>
</div>
