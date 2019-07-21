<?php 
function filiere_etudiant($nom_cours)
						{
							$management = array('Management des Projets', 'Management Associatif', 'Gestion des Ressources Humaines', 'Audit et Controle de Gestion', 'Gestion de la Paie');
						$formationCleEnMain = array('Ms Project Server Professionnel', 'Ms Access', 'Excel VBA', 'Entreprenariat et Montage de Projet', 'Infographie', 'Montage Video et Spot', 'Web Design', 'Redaction Professionnelle');
						$formationAlaCarte = array('Rediger un Schema Directeur', 'Rediger un Business Plan', 'Rediger un Plan Capacitif', 'Rediger un Cahier de Charge', 'Elaborer un plan de management des risques', 'Elaborer une DSF', 'Redaction d\'un Referentiel Projet a votre Entreprise', 'Creation de charte Graphique');
						
						$trainingDeHautNiveau = array('Communication Leadership et cohesion d\'equipe', 'Management et Leadership', 'Developper son Propre Leadership', 'Developper son Potentiel Humain', 'Deleguer Efficacement et prendre des decisions', 'Presenter Efficacement vos idees et projets', 'Conduite et Gestion des Projets', 'coutenance');
						
						$secretariat = array('Assistance de Direction ou Manager', 'secretaire', 'secretaire d\'assistance ou Accueil', 'secretaire Bureautique Bilingue', 'secretaire Comptable');
						
						$informatique = array('Maintenance Informatique', 'Maintenance des Reseaux Informatique', 'Culture Digitale', 'Marketing Digital', 'Fintech', 'Community Management', 'Applications Web', 'Applications Mobile');
						
						$comptabilite = array('Sage Comptabilite', 'Sage gestion Commerciale', 'Sage Paie');
						
						$vente = array('Methode et Outils de Fidelisation de la Clientele', 'Mener Efficacement les Negociations Commerciales');
						
						if(in_array($nom_cours, $management))
							$filiere = 'management';
						if(in_array($nom_cours, $formationCleEnMain))
							$filiere = 'formation cle en main';
						if(in_array($nom_cours, $formationAlaCarte))
							$filiere = 'formation a la carte';
						if(in_array($nom_cours, $trainingDeHautNiveau))
							$filiere = 'training de haut niveau';
						if(in_array($nom_cours, $secretariat))
							$filiere = 'secretariat';
						if(in_array($nom_cours, $informatique))
							$filiere = 'informatique';
						if(in_array($nom_cours, $comptabilite))
							$filiere = 'comptabilite';
						if(in_array($nom_cours, $vente))
							$filiere = 'vente';
						return $filiere;
						}
						
						
						
						 function plateforme($filiere)
						{
							$filiere_dispo = array('management', 'formation cle en main', 'formation a la carte', 'training de haut niveau', 'secretariat', 'informatique', 'comptabilite', 'vente');
							
								if($filiere==$filiere_dispo[0])
									$plateforme = 'Espace Manager';
								
								elseif($filiere==$filiere_dispo[1])
									$plateforme = 'Espace Formation cle en Main';
								
								elseif($filiere==$filiere_dispo[2])
									$plateforme = 'Espace Formation a la Carte';
								
								elseif($filiere==$filiere_dispo[3])
									$plateforme = 'Espace Training de Haut Niveau';
								
								elseif($filiere==$filiere_dispo[4])
									$plateforme = 'Espace Secretariat';
								
								elseif($filiere==$filiere_dispo[5])
									$plateforme = 'Espace Technologies Informatique';
								
								elseif($filiere==$filiere_dispo[6])
									$plateforme = 'Espace Comptabilite';
								
								elseif($filiere==$filiere_dispo[7])
									$plateforme = 'Espace Commercial';
							
							return $plateforme;
						}
 ?>