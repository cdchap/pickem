<div 
    class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-10 bg-white rounded-2xl shadow-black border-2 border-black px-4 md:px-6 py-6 ">
    <div class="col-span-1 md:col-span-2 flex flex-col justify-center items-center my-2">
        <div class="border-b-2 border-red-600 ">
            <h3 class="font-bold font-sans text-xl text-center">Pick %</h3>
        </div>
        <div class="mt-1">
            <span>{{ $bowl->visitor->abbreviation }}</span>
            <span>{{ $visitorPickPercentage }}%</span>
        </div>
        <div>
            <span>{{ $bowl->home->abbreviation }}</span>
            <span>{{ $homePickPercentage }}%</span>
        </div>
    </div>
    <div class="">
        <div
            class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 ">
                    <div class="shadow overflow-hidden rounded-2xl border-2 border-black">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Matchup
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <img class="h-5 w-5" src="{{$bowl->visitor->logo1}}" alt="">
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <img class="h-5 w-5" src="{{$bowl->home->logo1}}" alt="">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($bowlStats))
                                    @foreach ($bowlStats['0']['teams']['0']['stats'] as $i => $stats)   
                                        <tr class="{{$i % 2 == 1 ? 'bg-gray-50' : 'bg-white'}}">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{$stats['category']}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{$bowlStats['0']['teams']['1']['stats'][$i]['stat']}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{$bowlStats['0']['teams']['0']['stats'][$i]['stat']}}
                                            </td>
                                        </tr>
                                    @endforeach 
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="h-96 overflow-y-scroll">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Est pellentesque elit ullamcorper dignissim cras tincidunt. Enim eu turpis egestas pretium aenean pharetra. Turpis tincidunt id aliquet risus feugiat in. Nam aliquam sem et tortor consequat id porta. Adipiscing diam donec adipiscing tristique risus nec feugiat in. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque. Sit amet cursus sit amet. Lectus magna fringilla urna porttitor rhoncus dolor purus. Pellentesque elit eget gravida cum sociis natoque penatibus. At tellus at urna condimentum. Et tortor at risus viverra adipiscing. Cras tincidunt lobortis feugiat vivamus at augue eget. Interdum consectetur libero id faucibus nisl tincidunt eget nullam. Nisi vitae suscipit tellus mauris a diam. Arcu dictum varius duis at consectetur lorem donec. Nibh ipsum consequat nisl vel pretium. Purus gravida quis blandit turpis cursus in hac habitasse platea.

Leo vel orci porta non. Enim nec dui nunc mattis. Quis blandit turpis cursus in. Lorem dolor sed viverra ipsum nunc aliquet bibendum enim. Dolor sit amet consectetur adipiscing elit ut. Sit amet mattis vulputate enim nulla aliquet porttitor lacus. Vel facilisis volutpat est velit. Habitant morbi tristique senectus et netus et malesuada fames ac. Congue eu consequat ac felis donec et odio pellentesque. Mauris in aliquam sem fringilla ut morbi tincidunt. Eu sem integer vitae justo. Massa sed elementum tempus egestas sed sed. Vitae elementum curabitur vitae nunc sed. Nulla facilisi cras fermentum odio.

Interdum consectetur libero id faucibus nisl. Posuere urna nec tincidunt praesent. Odio pellentesque diam volutpat commodo sed. Posuere sollicitudin aliquam ultrices sagittis orci a scelerisque. Elit sed vulputate mi sit amet mauris commodo. Eget gravida cum sociis natoque penatibus et. Quam id leo in vitae turpis massa sed elementum. Elementum nisi quis eleifend quam adipiscing. Nulla porttitor massa id neque aliquam vestibulum morbi. Sem et tortor consequat id porta nibh venenatis cras sed. Sociis natoque penatibus et magnis dis. Dui vivamus arcu felis bibendum ut. Vestibulum mattis ullamcorper velit sed.

Nisi lacus sed viverra tellus in hac habitasse platea dictumst. At tellus at urna condimentum. Morbi tristique senectus et netus et malesuada fames ac turpis. Sed risus ultricies tristique nulla aliquet enim tortor. Proin libero nunc consequat interdum varius sit. Gravida dictum fusce ut placerat orci. Turpis egestas integer eget aliquet nibh praesent tristique magna sit. Donec enim diam vulputate ut pharetra sit amet aliquam id. Venenatis a condimentum vitae sapien pellentesque habitant morbi. Pellentesque adipiscing commodo elit at imperdiet dui. Cras pulvinar mattis nunc sed blandit libero volutpat sed cras. Sit amet nisl purus in mollis. Vehicula ipsum a arcu cursus vitae congue mauris. Nec ullamcorper sit amet risus. Nec feugiat in fermentum posuere urna nec. Vitae auctor eu augue ut lectus arcu bibendum at varius. Magna etiam tempor orci eu lobortis elementum.

In fermentum et sollicitudin ac orci phasellus. Leo integer malesuada nunc vel risus commodo. Lectus magna fringilla urna porttitor rhoncus. Quam vulputate dignissim suspendisse in est ante. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis. Sed vulputate mi sit amet mauris commodo quis. Arcu bibendum at varius vel pharetra vel. Id interdum velit laoreet id donec ultrices tincidunt. Quam viverra orci sagittis eu volutpat. Aliquam sem et tortor consequat id porta nibh venenatis cras. Tellus in hac habitasse platea dictumst. Pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus et. Enim nunc faucibus a pellentesque sit amet porttitor eget dolor. Ut tellus elementum sagittis vitae et. Quam pellentesque nec nam aliquam sem.

Duis convallis convallis tellus id. Adipiscing commodo elit at imperdiet dui. Nunc pulvinar sapien et ligula. Diam in arcu cursus euismod. Faucibus vitae aliquet nec ullamcorper sit. Vel orci porta non pulvinar neque laoreet suspendisse interdum. Quis blandit turpis cursus in hac habitasse platea dictumst quisque. Hendrerit gravida rutrum quisque non tellus orci ac auctor augue. Ac turpis egestas maecenas pharetra convallis posuere. Sed blandit libero volutpat sed cras. Vitae sapien pellentesque habitant morbi tristique senectus et netus et.

Sapien eget mi proin sed libero enim. Eu scelerisque felis imperdiet proin fermentum leo vel orci. Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Blandit cursus risus at ultrices mi tempus. Pretium nibh ipsum consequat nisl vel pretium lectus. Eu turpis egestas pretium aenean. Elementum facilisis leo vel fringilla. Faucibus pulvinar elementum integer enim neque volutpat ac. Convallis posuere morbi leo urna molestie at elementum eu facilisis. Non tellus orci ac auctor augue mauris augue neque. Id cursus metus aliquam eleifend mi in nulla posuere sollicitudin. At volutpat diam ut venenatis. A diam maecenas sed enim ut. Hac habitasse platea dictumst quisque. Odio morbi quis commodo odio aenean sed. Curabitur gravida arcu ac tortor dignissim. Vulputate mi sit amet mauris commodo quis imperdiet massa tincidunt.

Non odio euismod lacinia at quis risus sed vulputate. Egestas egestas fringilla phasellus faucibus scelerisque eleifend. Ut lectus arcu bibendum at varius vel. Placerat duis ultricies lacus sed. Sed vulputate odio ut enim blandit volutpat maecenas volutpat blandit. Gravida arcu ac tortor dignissim convallis aenean et tortor at. Natoque penatibus et magnis dis parturient montes. Est sit amet facilisis magna etiam tempor orci eu. Scelerisque purus semper eget duis. Tortor dignissim convallis aenean et tortor at risus viverra adipiscing. Nisl condimentum id venenatis a condimentum vitae sapien. Neque gravida in fermentum et. Auctor eu augue ut lectus arcu bibendum. Amet purus gravida quis blandit turpis cursus in hac habitasse. Ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Nec dui nunc mattis enim ut tellus elementum. Risus sed vulputate odio ut enim blandit.

Duis tristique sollicitudin nibh sit. Dictum fusce ut placerat orci nulla. Viverra suspendisse potenti nullam ac tortor vitae purus. Massa vitae tortor condimentum lacinia quis vel. Nec tincidunt praesent semper feugiat. Aliquam sem fringilla ut morbi. Quis eleifend quam adipiscing vitae. Enim facilisis gravida neque convallis a cras semper auctor neque. Sit amet tellus cras adipiscing enim eu turpis. Ut lectus arcu bibendum at varius vel pharetra vel turpis. Elementum integer enim neque volutpat. Eget nulla facilisi etiam dignissim. Congue eu consequat ac felis donec et odio pellentesque diam. Quis viverra nibh cras pulvinar. Nulla pharetra diam sit amet nisl suscipit adipiscing bibendum est. Massa ultricies mi quis hendrerit dolor. Pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus. Lectus urna duis convallis convallis tellus.

Quam elementum pulvinar etiam non quam. Sed enim ut sem viverra aliquet. Mattis aliquam faucibus purus in. Facilisi cras fermentum odio eu feugiat pretium. Porta lorem mollis aliquam ut porttitor leo a diam sollicitudin. Nibh venenatis cras sed felis eget. Nunc consequat interdum varius sit. Ac feugiat sed lectus vestibulum mattis. Maecenas sed enim ut sem viverra aliquet. Elementum eu facilisis sed odio morbi quis. Quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Nulla facilisi cras fermentum odio eu feugiat pretium nibh ipsum.

Volutpat commodo sed egestas egestas fringilla phasellus. Adipiscing elit duis tristique sollicitudin nibh sit. Dolor morbi non arcu risus. Volutpat maecenas volutpat blandit aliquam etiam erat velit scelerisque in. Egestas fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Dolor sed viverra ipsum nunc aliquet bibendum enim facilisis. Pellentesque eu tincidunt tortor aliquam nulla facilisi. Pellentesque eu tincidunt tortor aliquam nulla facilisi. Scelerisque in dictum non consectetur a erat nam at. Placerat vestibulum lectus mauris ultrices eros in. Quam viverra orci sagittis eu volutpat odio facilisis. Aliquet porttitor lacus luctus accumsan tortor posuere ac. Fermentum posuere urna nec tincidunt praesent semper feugiat nibh sed.

Molestie at elementum eu facilisis sed odio morbi quis commodo. Sit amet consectetur adipiscing elit ut aliquam. Lectus sit amet est placerat in egestas erat imperdiet sed. Nec ullamcorper sit amet risus nullam eget felis eget nunc. Et netus et malesuada fames ac turpis egestas sed tempus. Facilisis mauris sit amet massa. Amet commodo nulla facilisi nullam vehicula ipsum a. Tristique senectus et netus et malesuada. Ut tristique et egestas quis. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus. Aliquam etiam erat velit scelerisque in. Consequat id porta nibh venenatis cras sed felis eget velit. Cursus in hac habitasse platea dictumst. Id interdum velit laoreet id donec ultrices tincidunt arcu. Imperdiet sed euismod nisi porta lorem mollis aliquam ut. Pharetra diam sit amet nisl suscipit adipiscing bibendum. Semper risus in hendrerit gravida. Lorem ipsum dolor sit amet consectetur adipiscing. Penatibus et magnis dis parturient montes nascetur ridiculus mus mauris. Adipiscing commodo elit at imperdiet dui.

Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae. Nunc id cursus metus aliquam eleifend mi in nulla posuere. Mi bibendum neque egestas congue. Pretium lectus quam id leo. Ultricies mi eget mauris pharetra et ultrices neque ornare aenean. Suscipit adipiscing bibendum est ultricies integer quis. At imperdiet dui accumsan sit. Sem fringilla ut morbi tincidunt augue interdum velit. Tellus elementum sagittis vitae et. Sed odio morbi quis commodo.

Egestas congue quisque egestas diam in arcu cursus euismod. Posuere lorem ipsum dolor sit amet consectetur adipiscing elit duis. Tellus at urna condimentum mattis pellentesque id nibh. Eros donec ac odio tempor. Est ullamcorper eget nulla facilisi etiam dignissim diam. Nam aliquam sem et tortor consequat id porta. Nunc lobortis mattis aliquam faucibus purus. Congue mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Massa tincidunt dui ut ornare lectus sit. Suspendisse sed nisi lacus sed viverra tellus in hac habitasse. Faucibus interdum posuere lorem ipsum. Molestie ac feugiat sed lectus vestibulum mattis ullamcorper velit sed. Vitae et leo duis ut diam quam nulla. Auctor elit sed vulputate mi sit amet mauris commodo. Fermentum et sollicitudin ac orci phasellus egestas tellus rutrum. Hac habitasse platea dictumst quisque sagittis purus sit amet volutpat.

Congue quisque egestas diam in arcu cursus euismod. Massa enim nec dui nunc mattis enim ut tellus. Enim sit amet venenatis urna cursus eget nunc scelerisque viverra. Sit amet tellus cras adipiscing enim eu turpis egestas pretium. Dignissim diam quis enim lobortis scelerisque fermentum dui faucibus. Nec nam aliquam sem et tortor consequat id porta. Dictum non consectetur a erat nam at lectus urna duis. Lacus vel facilisis volutpat est. Eget lorem dolor sed viverra ipsum nunc aliquet bibendum. Amet purus gravida quis blandit. Tortor at risus viverra adipiscing at in.

Tellus orci ac auctor augue mauris augue neque gravida in. Tincidunt praesent semper feugiat nibh sed pulvinar proin gravida. Cursus euismod quis viverra nibh cras pulvinar mattis. Felis bibendum ut tristique et egestas quis. Faucibus ornare suspendisse sed nisi lacus sed viverra. Platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras. Nullam vehicula ipsum a arcu cursus. Blandit aliquam etiam erat velit scelerisque in dictum non. Netus et malesuada fames ac turpis egestas integer eget. Volutpat odio facilisis mauris sit. Sed pulvinar proin gravida hendrerit. Arcu ac tortor dignissim convallis. Scelerisque viverra mauris in aliquam sem fringilla ut. Lectus sit amet est placerat in egestas erat. Odio pellentesque diam volutpat commodo.

Amet tellus cras adipiscing enim eu turpis. Ut etiam sit amet nisl purus in mollis nunc. Faucibus nisl tincidunt eget nullam non nisi est sit amet. Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Sed blandit libero volutpat sed. Egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate. Purus in mollis nunc sed id semper risus in hendrerit. In hendrerit gravida rutrum quisque. At tempor commodo ullamcorper a lacus vestibulum. Id diam maecenas ultricies mi eget mauris pharetra. Eget est lorem ipsum dolor sit amet consectetur adipiscing. Volutpat sed cras ornare arcu. Nulla facilisi morbi tempus iaculis urna id volutpat lacus laoreet. Mattis rhoncus urna neque viverra justo nec ultrices. Vestibulum mattis ullamcorper velit sed. Volutpat est velit egestas dui id ornare arcu odio. Ornare lectus sit amet est placerat in.

Donec massa sapien faucibus et molestie ac feugiat sed lectus. Sit amet porttitor eget dolor morbi non arcu. Senectus et netus et malesuada fames ac. Quam id leo in vitae turpis massa sed elementum. Ut aliquam purus sit amet luctus venenatis lectus. Arcu ac tortor dignissim convallis aenean et. Elit pellentesque habitant morbi tristique senectus et netus et. Malesuada fames ac turpis egestas. Et odio pellentesque diam volutpat commodo sed. Viverra suspendisse potenti nullam ac tortor vitae purus. Tincidunt augue interdum velit euismod in pellentesque massa placerat duis. Ut eu sem integer vitae justo eget magna fermentum iaculis.

Sit amet volutpat consequat mauris nunc congue nisi vitae. Dis parturient montes nascetur ridiculus mus mauris vitae ultricies leo. Sem et tortor consequat id porta nibh venenatis cras. Convallis a cras semper auctor. Imperdiet nulla malesuada pellentesque elit eget gravida cum. Sed blandit libero volutpat sed. Tortor pretium viverra suspendisse potenti nullam ac tortor. Mi ipsum faucibus vitae aliquet nec. Sodales neque sodales ut etiam sit amet. Sit amet est placerat in egestas. Viverra vitae congue eu consequat ac felis. Quis eleifend quam adipiscing vitae proin sagittis nisl. Non pulvinar neque laoreet suspendisse interdum consectetur libero. Arcu odio ut sem nulla pharetra diam. Tortor dignissim convallis aenean et tortor.

Auctor augue mauris augue neque gravida in fermentum et. Pellentesque habitant morbi tristique senectus et netus. Sit amet mattis vulputate enim nulla. Adipiscing diam donec adipiscing tristique risus nec. In egestas erat imperdiet sed euismod nisi porta lorem mollis. Diam vel quam elementum pulvinar. Lacus luctus accumsan tortor posuere ac ut. Ullamcorper malesuada proin libero nunc consequat interdum varius. Tincidunt id aliquet risus feugiat in ante. Ipsum faucibus vitae aliquet nec ullamcorper sit.
            </p>
        </div>
        <div class="mt-2">
            <h3 class="font-sans font-bold text-xl">Comment</h3>
            <textarea class="mt-1 mb-4 border-2 block w-full sm:text-sm border-black rounded-2xl" name="" id="" cols="30" rows="10"></textarea>
            <div class="flex justify-end">
                <span class="inline-flex rounded-md shadow-sm">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                        Comment
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>

