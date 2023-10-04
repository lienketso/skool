<footer class="footer-skool">
    <div class="container">

                <ul class="list-unstyled mb-0">
                    @foreach($pageFoot as $d)
                        <li class="py-0"><a href="{{route('frontend::page.index.get',$d->slug)}}" class="lh-2 font-weight-500">{{$d->name}}</a> </li>
                    @endforeach
                </ul>
        </div>

</footer>
