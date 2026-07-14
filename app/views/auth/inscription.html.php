<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CotiClass — Inscription</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>tailwind.config={theme:{extend:{fontFamily:{sans:['Inter','ui-sans-serif','system-ui']}}}}</script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="font-sans bg-gray-50 text-gray-900 min-h-screen flex">

  <div class="hidden lg:flex lg:w-1/2 bg-gray-900 text-white flex-col justify-between p-12">
    <div class="flex items-center gap-2">
      <div class="w-8 h-8 rounded-lg bg-white text-gray-900 flex items-center justify-center font-bold">C</div>
      <span class="font-semibold text-lg">CotiClass</span>
    </div>
    <div>
      <p class="text-sm text-gray-400 mb-3 uppercase tracking-wide">Auto-inscription</p>
      <h1 class="text-3xl font-semibold leading-snug">Rejoignez votre promotion en 2 minutes.</h1>
      <p class="mt-4 text-gray-400 max-w-sm text-sm leading-relaxed">Votre gérant validera votre inscription — vous retrouverez ensuite votre historique et l'état de vos cotisations à tout moment.</p>
    </div>
    <p class="text-xs text-gray-500">© 2026 CotiClass</p>
  </div>

  <div class="flex-1 flex items-center justify-center p-6">
    <form class="w-full max-w-sm">
      <div class="lg:hidden flex items-center gap-2 mb-8 justify-center">
        <div class="w-8 h-8 rounded-lg bg-gray-900 text-white flex items-center justify-center font-bold text-sm">C</div>
        <span class="font-semibold text-lg">CotiClass</span>
      </div>

      <h2 class="text-xl font-semibold mb-1">Rejoignez-nous</h2>
      <p class="text-sm text-gray-500 mb-6">Créez votre compte CotiClass. Un utilisateur peut cumuler jusqu'à 2 rôles (ex. Gérant, qui reste aussi Apprenant).</p>

      <label class="block text-xs font-medium text-gray-600 mb-1">Nom complet</label>
      <input type="text" placeholder="Jean-Pierre Dupont" class="w-full mb-4 rounded-lg border border-gray-200 px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900/10 focus:border-gray-400">

      <label class="block text-xs font-medium text-gray-600 mb-1">Email</label>
      <input type="email" placeholder="votre.nom@etudiant.fr" class="w-full mb-4 rounded-lg border border-gray-200 px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900/10 focus:border-gray-400">

      <label class="block text-xs font-medium text-gray-600 mb-2">Rôle(s) — 1 à 2 maximum</label>
      <div class="grid grid-cols-3 gap-2 mb-4 text-xs">
        <label id="role-apprenant" class="flex flex-col items-center gap-1.5 border-2 border-gray-900 rounded-lg py-2.5 cursor-pointer font-medium">
          <input type="checkbox" checked onchange="toggleRole('role-apprenant', this)" class="accent-gray-900"> Apprenant
        </label>
        <label id="role-gerant" class="flex flex-col items-center gap-1.5 border border-gray-200 rounded-lg py-2.5 cursor-pointer text-gray-500">
          <input type="checkbox" onchange="toggleRole('role-gerant', this)" class="accent-gray-900"> Gérant
        </label>
      </div>
      <p class="text-xs text-gray-400 -mt-2 mb-4">Le rôle "Apprenant" est coché par défaut : tout compte reste rattaché à une cotisation, même un Gérant.</p>

      <label class="block text-xs font-medium text-gray-600 mb-1">Mot de passe</label>
      <input type="password" placeholder="••••••••" class="w-full mb-4 rounded-lg border border-gray-200 px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900/10 focus:border-gray-400">

      <label class="block text-xs font-medium text-gray-600 mb-1">Confirmer le mot de passe</label>
      <input type="password" placeholder="••••••••" class="w-full mb-5 rounded-lg border border-gray-200 px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900/10 focus:border-gray-400">

      <button type="button" class="w-full bg-gray-900 text-white rounded-lg py-2.5 text-sm font-medium hover:bg-gray-800 transition">S'inscrire</button>

      <p class="text-center text-sm text-gray-500 mt-5">Vous avez déjà un compte ? <a href="connexion.html" class="text-gray-900 font-medium">Se connecter</a></p>
    </form>
  </div>

<script>
function toggleRole(id, input){
  const checked = document.querySelectorAll('#role-apprenant input:checked, #role-gerant input:checked, #role-coach input:checked');
  if(checked.length > 2){
    input.checked = false;
    alert('Un utilisateur ne peut cumuler que 2 rôles maximum.');
    return;
  }
  if(checked.length === 0){
    input.checked = true;
    return;
  }
  const label = document.getElementById(id);
  label.classList.toggle('border-2', input.checked);
  label.classList.toggle('border-gray-900', input.checked);
  label.classList.toggle('font-medium', input.checked);
  label.classList.toggle('border', !input.checked);
  label.classList.toggle('border-gray-200', !input.checked);
  label.classList.toggle('text-gray-500', !input.checked);
}
</script>
</body>
</html>