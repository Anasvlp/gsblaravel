@extends ('sommaireAdmin')
    @section('contenu1')
    <div id="contenu">
    <h2>Liste des visiteurs </h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Login</th>
                <th scope="col">Mdp</th>
                <th scope="col">Adresse</th>
                <th scope="col">CP</th>
                <th scope="col">Ville</th>
                <th scope="col">Date d'embauche</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($les_visiteurs as $visiteur) 
        {
        ?>
        <tr>
            <td> <?php echo $visiteur['id']; ?> </td>
            <td> <?php echo $visiteur['nom']; ?> </td>
            <td> <?php echo $visiteur['prenom']; ?> </td>
            <td> <?php echo $visiteur['login']; ?> </td>
            <td> <?php echo $visiteur['mdp']; ?> </td>
            <td> <?php echo $visiteur['adresse']; ?> </td>
            <td> <?php echo $visiteur['cp']; ?> </td>
            <td> <?php echo $visiteur['ville']; ?> </td>
            <td> <?php echo $visiteur['dateEmbauche']; ?> </td>

        </tr> 
        <?php
        }
        ?>
        </tbody>
        </table>
        <form action="{{ route('chemin_pdf') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="data" value="{{ json_encode($les_visiteurs) }}">
    <input id="ok" type="submit" value="pdf" size="20" />
</form>



    @endsection  