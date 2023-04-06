<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Code postal</th>
            <th>Ville</th>
            <th>Date d'embauche</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $visiteur)
        <tr>
            <td>{{ $visiteur['nom'] }}</td>
            <td>{{ $visiteur['prenom'] }}</td>
            <td>{{ $visiteur['adresse'] }}</td>
            <td>{{ $visiteur['cp'] }}</td>
            <td>{{ $visiteur['ville'] }}</td>
            <td>{{ $visiteur['dateEmbauche'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
