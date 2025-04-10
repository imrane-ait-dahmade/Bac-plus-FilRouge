@props([
    'background'  => ' #B3DCA0',
    'hover' => '#72AE55',

])

<style>
.btnPrincipal{
background: {{$background}};
font-family: 'Overpass Mono',Serif;
    font-weight: 600;
    font-size: 32px;
border-radius: 14px;
padding: 10px 20px;
color: black;
border: none;
cursor: pointer;
transition: background 0.3s ease;
    width: 100%;
    margin-bottom: 2rem;
}
.btnPrincipal:hover{
background: {{$hover}};
}
</style>

<button class="btnPrincipal">
 {{$slot}}
</button>
