@if(Auth::user())
  @if (Auth::user()->type == "recruteur" || Auth::user()->type == 'Recruteur')
 
    <a class="dropdown-item pr-2" href="/EntrepriseDash/{{ Auth::user()->id }}">Dashboard</a>
    <div class="dropdown-divider mx-2"></div>

  
  @else

    <a class="dropdown-item pr-2" href="/Dashboard/{{Auth::user()->id}}">Paramétres</a>
  
  @endif

@endif