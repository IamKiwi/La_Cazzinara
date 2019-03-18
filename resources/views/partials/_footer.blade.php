<!-- Footer -->
<footer id="footer" class="dark-back">
    <ul class="copyright">
        <li>&copy; La Cazzinara</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        @if(Cookie::get('theme') !== null && Cookie::get('theme') === 'dark')
            <li><a href="{{ route('pages.light') }}" class="dropdown-item">Włącz jasny motyw</a></li>
        @else
            <li><a href="{{ route('pages.dark') }}" class="dropdown-item">Włącz ciemny motyw</a></li>
        @endif
    </ul>
</footer>