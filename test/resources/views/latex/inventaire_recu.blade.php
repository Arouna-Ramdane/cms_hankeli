\documentclass[9pt,a4paper]{article}

\usepackage[utf8]{inputenc}
\usepackage[T1]{fontenc}
\usepackage{lmodern}
\usepackage[french]{babel}
\usepackage{geometry}
\usepackage{array}
\usepackage{longtable}
\usepackage{fancyhdr}
\usepackage{xcolor}

\geometry{left=1cm,right=1cm,top=1.5cm,bottom=1.5cm}
\setlength{\parindent}{0pt}
\renewcommand{\arraystretch}{1.2}

% Header / Footer
\pagestyle{fancy}
\fancyhf{}
\fancyfoot[L]{\small {{ $date }}}
\fancyfoot[C]{\small \thepage}
\fancyfoot[R]{\small {{ date('H:i:s') }}}

\begin{document}

% ================= EN-TÊTE =================
\begin{center}
    \textbf{CMS HANKELI}\\
    \textbf{RAPPORT DE VENTE}\\
    \textbf{DE MEDICAMENTS}
\end{center}

\vspace{0.3cm}

\textbf{Date :} {{ $date }}

\vspace{0.3cm}

% ================= RESUME =================
\begin{tabular}{|p{5cm}|r|r|r|}
\hline
\textbf{Désignation du groupe} &
\textbf{Montant total vendu} &
\textbf{Montant PEC} &
\textbf{Montant encaissé} \\ \hline

MEDICAMENTS &
{{ number_format($total,0,',',' ') }} FCFA &
0 FCFA &
{{ number_format($total,0,',',' ') }} FCFA \\ \hline
\end{tabular}

\vspace{0.4cm}

\begin{center}
\textbf{DETAIL DES RECETTES}
\end{center}

\vspace{0.2cm}

% ================= TABLEAU DETAIL =================
\begin{longtable}{|
p{1.5cm}|
p{4.5cm}|
p{1.2cm}|
p{3cm}|
p{2.2cm}|
p{2.6cm}|
}
\hline
\textbf{REF} &
\textbf{DESIGNATION} &
\textbf{QTE} &
\textbf{MONTANT VENDU} &
\textbf{MONTANT PEC} &
\textbf{MONTANT ENCAISSE} \\ \hline
\endhead

@foreach($lignes as $ligne)
{{ $ligne->produit_id }} &
{{ $ligne->libelle }} &
{{ $ligne->quantite_totale }} &
{{ number_format($ligne->montant_total,0,',',' ') }} FCFA &
0 FCFA &
{{ number_format($ligne->montant_total,0,',',' ') }} FCFA \\ \hline
@endforeach

\end{longtable}


\end{document}
