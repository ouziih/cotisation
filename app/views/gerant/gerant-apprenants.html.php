<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CotiClass — Gestion des apprenants</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>tailwind.config={theme:{extend:{fontFamily:{sans:['Inter','ui-sans-serif','system-ui']}}}}</script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/style.css">
</head>
<body class="font-sans bg-gray-50 text-gray-900 min-h-screen pb-16 md:pb-0">

<header class="sticky top-0 z-20 bg-white border-b border-gray-200 px-4 md:px-8 h-14 flex items-center justify-between">
  <div class="flex items-center gap-2">
    <div class="w-7 h-7 rounded-lg bg-gray-900 text-white flex items-center justify-center font-bold text-xs">C</div>
    <span class="font-semibold hidden sm:block">CotiClass</span>
    <span class="text-gray-300 hidden md:block">/</span>
    <span class="text-gray-500 text-sm hidden md:block">Apprenants</span>
  </div>
  <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-700 flex items-center justify-center text-xs font-semibold">FM</div>
</header>

<div class="md:flex">
  <aside class="hidden md:flex md:flex-col md:w-56 md:shrink-0 border-r border-gray-200 min-h-[calc(100vh-56px)] p-4 gap-1">
    <a href="gerant-dashboard.html" class="nav-link"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M3 11l9-7 9 7"/><path d="M5 10v9a1 1 0 0 0 1 1h4v-6h4v6h4a1 1 0 0 0 1-1v-9"/></svg>Vue d'ensemble</a>
    <a href="gerant-suivi.html" class="nav-link"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>Suivi hebdomadaire</a>
    <a href="gerant-paiement.html" class="nav-link"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M3 7a2 2 0 0 1 2-2h13a1 1 0 0 1 1 1v3"/><path d="M3 7v10a2 2 0 0 0 2 2h14a1 1 0 0 0 1-1v-3"/><path d="M16 12h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a2 2 0 0 1 0-4z"/></svg>Paiements</a>
    <a href="gerant-campagnes.html" class="nav-link"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M3 11v2a2 2 0 0 0 2 2h1l3 5V6l-3 5H5a2 2 0 0 0-2 2z"/><path d="M13 8a4 4 0 0 1 0 8"/></svg>Campagnes</a>
    <a href="gerant-apprenants.html" class="nav-link active"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><circle cx="9" cy="8" r="3"/><path d="M2 20c0-3.3 3.1-6 7-6s7 2.7 7 6"/><circle cx="17" cy="9" r="2.5"/><path d="M22 20c0-2.6-2-4.8-4.7-5.6"/></svg>Apprenants</a>
    <div class="flex-1"></div>
    <a href="index.html" class="nav-link text-gray-400"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M9 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h3"/><path d="M15 16l4-4-4-4"/><path d="M19 12H9"/></svg>Déconnexion</a>
  </aside>

  <main class="flex-1 p-4 md:p-8 max-w-5xl">
    <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
      <div>
        <h1 class="text-xl font-semibold">Gestion des apprenants</h1>
        <p class="text-sm text-gray-500">42 apprenants inscrits · 3 méthodes d'ajout disponibles</p>
      </div>
      <div class="flex gap-2">
        <button onclick="document.getElementById('modal-import').classList.remove('hidden')" class="flex items-center gap-1.5 border border-gray-200 text-sm font-medium px-3 py-2 rounded-lg hover:bg-gray-50">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4"><path d="M12 3v12m0 0l-4-4m4 4l4-4"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"/></svg>Importer
        </button>
        <button onclick="document.getElementById('modal-add').classList.remove('hidden')" class="flex items-center gap-1.5 bg-gray-900 text-white text-sm font-medium px-3 py-2 rounded-lg hover:bg-gray-800">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4"><path d="M12 5v14M5 12h14"/></svg>Ajouter
        </button>
      </div>
    </div>

    <div class="relative mb-4 max-w-xs">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4-4"/></svg>
      <input type="text" placeholder="Rechercher un apprenant…" class="w-full pl-9 pr-3 py-2 rounded-lg border border-gray-200 text-sm">
    </div>

    <div class="card overflow-hidden">
      <table class="w-full text-sm">
        <thead>
          <tr class="border-b border-gray-100 text-left text-gray-500">
            <th class="px-4 py-3 font-medium">Nom</th>
            <th class="px-4 py-3 font-medium hidden sm:table-cell">Inscription</th>
            <th class="px-4 py-3 font-medium">Statut</th>
            <th class="px-4 py-3 font-medium text-right">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
          <tr>
            <td class="px-4 py-3 font-medium">Alexandre Dupont</td>
            <td class="px-4 py-3 hidden sm:table-cell text-gray-500">Auto-inscription</td>
            <td class="px-4 py-3"><span class="badge badge-green">À jour</span></td>
            <td class="px-4 py-3 text-right"><button class="text-gray-400 hover:text-gray-900 text-xs">Modifier</button></td>
          </tr>
          <tr>
            <td class="px-4 py-3 font-medium">Marie-Claire Lefebvre</td>
            <td class="px-4 py-3 hidden sm:table-cell text-gray-500">Import Excel</td>
            <td class="px-4 py-3"><span class="badge badge-red">En retard</span></td>
            <td class="px-4 py-3 text-right"><button class="text-gray-400 hover:text-gray-900 text-xs">Modifier</button></td>
          </tr>
          <tr>
            <td class="px-4 py-3 font-medium">Julien Martin</td>
            <td class="px-4 py-3 hidden sm:table-cell text-gray-500">Ajout manuel</td>
            <td class="px-4 py-3"><span class="badge badge-red">En retard</span></td>
            <td class="px-4 py-3 text-right"><button class="text-gray-400 hover:text-gray-900 text-xs">Modifier</button></td>
          </tr>
          <tr>
            <td class="px-4 py-3 font-medium">Sarah Bernard</td>
            <td class="px-4 py-3 hidden sm:table-cell text-gray-500">Auto-inscription</td>
            <td class="px-4 py-3"><span class="badge badge-green">À jour</span></td>
            <td class="px-4 py-3 text-right"><button class="text-gray-400 hover:text-gray-900 text-xs">Modifier</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</div>

<!-- MODALE : ajout manuel -->
<div id="modal-add" class="hidden fixed inset-0 bg-black/40 z-30 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl w-full max-w-sm p-5">
    <div class="flex items-center justify-between mb-4">
      <h3 class="font-semibold">Ajouter un apprenant</h3>
      <button onclick="document.getElementById('modal-add').classList.add('hidden')" class="text-gray-400">✕</button>
    </div>
    <label class="block text-xs font-medium text-gray-600 mb-1">Nom complet</label>
    <input type="text" placeholder="Nom et prénom" class="w-full mb-3 rounded-lg border border-gray-200 px-3 py-2.5 text-sm">
    <label class="block text-xs font-medium text-gray-600 mb-1">Email</label>
    <input type="email" placeholder="email@promotion.fr" class="w-full mb-4 rounded-lg border border-gray-200 px-3 py-2.5 text-sm">
    <button class="w-full bg-gray-900 text-white rounded-lg py-2.5 text-sm font-medium hover:bg-gray-800">Ajouter à la classe</button>
  </div>
</div>

<!-- MODALE : import fichier -->
<div id="modal-import" class="hidden fixed inset-0 bg-black/40 z-30 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl w-full max-w-sm p-5">
    <div class="flex items-center justify-between mb-4">
      <h3 class="font-semibold">Importer un fichier</h3>
      <button onclick="document.getElementById('modal-import').classList.add('hidden')" class="text-gray-400">✕</button>
    </div>
    <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center mb-4">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-8 h-8 mx-auto text-gray-300 mb-2"><path d="M12 3v12m0 0l-4-4m4 4l4-4"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"/></svg>
      <p class="text-sm text-gray-500">Glissez un fichier .xlsx ou .csv</p>
      <p class="text-xs text-gray-400 mt-1">Colonnes attendues : nom, prénom, email</p>
    </div>
    <button class="w-full bg-gray-900 text-white rounded-lg py-2.5 text-sm font-medium hover:bg-gray-800">Importer</button>
  </div>
</div>

<nav class="md:hidden fixed bottom-0 inset-x-0 bg-white border-t border-gray-200 flex z-20">
  <a href="gerant-dashboard.html" class="tab-mobile"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M3 11l9-7 9 7"/><path d="M5 10v9a1 1 0 0 0 1 1h4v-6h4v6h4a1 1 0 0 0 1-1v-9"/></svg>Accueil</a>
  <a href="gerant-suivi.html" class="tab-mobile"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>Suivi</a>
  <a href="gerant-paiement.html" class="tab-mobile"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M3 7a2 2 0 0 1 2-2h13a1 1 0 0 1 1 1v3"/><path d="M3 7v10a2 2 0 0 0 2 2h14a1 1 0 0 0 1-1v-3"/><path d="M16 12h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a2 2 0 0 1 0-4z"/></svg>Paiement</a>
  <a href="gerant-campagnes.html" class="tab-mobile"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M3 11v2a2 2 0 0 0 2 2h1l3 5V6l-3 5H5a2 2 0 0 0-2 2z"/><path d="M13 8a4 4 0 0 1 0 8"/></svg>Campagnes</a>
  <a href="gerant-apprenants.html" class="tab-mobile active"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><circle cx="9" cy="8" r="3"/><path d="M2 20c0-3.3 3.1-6 7-6s7 2.7 7 6"/><circle cx="17" cy="9" r="2.5"/><path d="M22 20c0-2.6-2-4.8-4.7-5.6"/></svg>Classe</a>
</nav>
</body>
</html>