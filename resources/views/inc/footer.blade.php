<div id="ftr">
   <footer class="footer page-footer bg-secondary text-white">
        @if (Request::path() == 'dashboard')
            <a href="/" class="footerbtn">
                <button id="logout" type="button" class="btn btn-success btn-xs">Logout</button>
            </a>
        @else
            <button data-toggle="modal" data-target="#modal" type="button" id="upload" class=" footerbtn btn btn-success btn-xs">Upload Event</button>
        @endif
        <div class="text-center py-3">
            ©2019 Copyright:
            <a href="http://twitter.com/kevaldholakiya5"> Keval Dholakiya</a>
        </div>
    </footer> 
</div>

