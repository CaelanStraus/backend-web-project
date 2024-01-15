<x-app-layout>
    <div style="display: flex; justify-content: center; position: relative;">
        <img class="zoomable-image" src="{{ asset('images/Hub-topview.webp') }}" alt="Top View Image" style="height: auto; width: 75%; margin-top: 50px; margin-bottom: 50px; z-index: 1;">

        <img class="soul-1 fairysoul" src="{{ asset('images/Fairy_Soul.webp') }}" alt="Fairy Soul Image" style="height: 0.2%; width: 0.2%; z-index: 2; position: absolute; top: 25.5%; right: 56.8%; cursor: pointer;" onclick="toggleTransparency(this)">

        <img class="soul-2 fairysoul" src="{{ asset('images/Fairy_Soul.webp') }}" alt="Second Fairy Soul Image" style="height: 0.2%; width: auto; z-index: 2; position: absolute; top: 39.5%; right: 46%; cursor: pointer;" onclick="toggleTransparency(this)">

        <div id="buttons-container" style="position: absolute; top: 0; right: 0;"></div>
    </div>

    <script src="{{ asset('js/soulScript.js') }}"></script>
</x-app-layout>
