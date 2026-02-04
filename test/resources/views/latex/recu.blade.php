\documentclass[10pt]{article}

\usepackage[utf8]{inputenc}
\usepackage[T1]{fontenc}
\usepackage{lmodern}
\usepackage[french]{babel}
\usepackage{geometry}
\usepackage{array}
\usepackage{setspace}

% ====== FORMAT DEMI A4 ======
\geometry{
  paperwidth=210mm,
  paperheight=148mm,
  top=8mm,
  bottom=8mm,
  left=8mm,
  right=8mm
}

\setlength{\parindent}{0pt}

% ====== COMPOSANT RECU ======
\newcommand{\recu}{
\begin{minipage}[t]{0.48\linewidth}
\small
\textbf{REPUBLIQUE TOGOLAISE}\\
MINISTERE DE LA SANTE\\
CMS HANKELI\\
\rule{\linewidth}{0.4pt}

\textbf{Client :} {{ $commande->name }}\\
\textbf{Facture n° :} {{ $commande->commande_id }}\\
\textbf{Date :} {{ $commande->created_at }}\\
\textbf{Caissier :} {{ $commande->user_first_name }} {{ $commande->user_name }}

\vspace{0.2cm}

\begin{tabular}{|p{3cm}|c|r|}
\hline
Désignation & Qté & Montant \\ \hline
@foreach($ligneCommande as $ligne)
{{ $ligne->libelle }} &
{{ $ligne->quantite }} &
{{ number_format($ligne->prix_ligne,0,',',' ') }} \\ \hline
@endforeach
\end{tabular}

\vspace{0.2cm}

\textbf{TOTAL :}
{{ number_format($commande->prix_total,0,',',' ') }} FCFA

\vspace{0.2cm}

\centerline{\textit{Merci pour votre confiance}}
\end{minipage}
}

% ====== DOCUMENT ======
\begin{document}

\recu \hfill \recu

\end{document}
