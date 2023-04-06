@extends ('modeles/visiteur')
    @section('menu')
            <!-- Division pour le sommaire -->
        <div id="menuGauche">
            <div id="infosUtil">
                  
             </div>  
               <ul id="menuList">
                   <li >
                    <strong>Bonjour {{ $admin ['nom'] . ' ' . $admin['prenom']}}</strong>
                      
                   </li>
                  <li class="smenu">
                     <a href="{{ route('chemin_ajouterSaisie')}}" title="Ajouter un visiteur">Ajouter un visiteur</a>
                  </li>
                  <li class="smenu">
                    <a href="{{ route('chemin_modifierChoix') }}" title="Modifier un visiteur">Modifier un visiteur</a>
                  </li>
                  <li class="smenu">
                     <a href="{{ route('chemin_lister')}}" title="Afficher la liste des visiteurs">Liste des visiteurs</a>
                  </li>
               <li class="smenu">
                <a href="{{ route('chemin_deconnexion')}}" title="Se déconnecter">Déconnexion</a>
                  </li>
                </ul>
               
        </div>
    @endsection          