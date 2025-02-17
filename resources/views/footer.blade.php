<footer class="bg-dark">
    <div class="container d-flex flex-column align-items-center">
         <!--Cek apakah yang login merupakan admin(RickyDarmawan@gmail.com) atau user -->
         @if(Auth::check() && Auth::user()->email == 'RickyDarmawan@gmail.com')
            <!-- Jika admin yang login, maka mengarahkan addmin untuk melihat semua complaint dari user -->
            <a href="{{ route('complaint.admin') }}" class="text-white mb-2" style="font-size: 0.9rem; text-decoration: none; font-weight: bold;">View Complaints</a>
        @else
            <!-- Jika user yang login, maka tampilkan form untuk complaint -->
            <a href="{{ route('complaint.edit') }}" class="text-white mb-2" style="font-size: 0.9rem; text-decoration: none; font-weight: bold;">Complaint Form</a>
        @endif
        <!-- Copyright Text -->
        <p class="m-0 text-white">Copyright &copy; Kelas B Kelompok 4</p>
    </div>
</footer>

<script src="{{asset('/js/bootstrap.bundle.min.js')}}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="{{asset('/js/bootstrap.min.js')}}" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>