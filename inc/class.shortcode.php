<?php

if(!class_exists('SimpleHierarchicalSitemapShortcode')){
	
	class SimpleHierarchicalSitemapShortcode{
		private $posts_id;
		private $catégories;
		
		public function __construct($params){
			//On récupère les ID des articles/pages à ne pas afficher.
			$exclure = explode(",", str_replace(" ", "", $params['exclude']));
			
			//On initialise le tableau des ID déjà chargées à partir des ID à exclure.
			$this->posts_id = is_array($exclure) ? $exclure : array();
			
			//On charge toutes les catégories
			$this->catégories 	= array_values(get_categories());
		}
		
		private function chargerPages(){
			$html = "<ul>";
			
			$pages = get_pages(array('exclude' => $this->posts_id ));
			foreach ( $pages as $page ){
				$id		= $page->ID;
				$titre 	= $page->post_title;
				$lien 	= apply_filters('the_permalink', get_permalink($id));
				
				$html .= "<li><a href=\"$lien\" title=\"$titre\">$titre</a></li>";
				
				$this->posts_id[] = $id;
			}
			
			$html .= "</ul>";
			
			return $html;
		}
		
		private function stdClassArray_search($tableau, $attribut, $valeur){
			$id = -1;
			
			//On passe en revue tous les objets du tableau
			for($indice = 0; $indice < count($tableau); $indice++){
				$objet = $tableau[$indice];
				
				//Si un attribut de l'objet correspond à la valeur cherchée..
				if($objet->$attribut == $valeur){
					//On mémorise le numéro de l'élément dans le tableau.
					$id = $indice;
					
					//On quitte.
					break;
				}
			}
			
			return $id;
		}
		
		private function chargerCatégorie($cat_ID = 0){
			$html = "<ul>";
			
			//Listing des catégories
			$indice = $this->stdClassArray_search($this->catégories, "parent", $cat_ID);
			while($indice > -1){
				//Récupération de la catégorie trouvée
				$catégorie = $this->catégories[$indice];
				
				//Extraction des infos de la catégorie
				$sitemap_category_ID 		= $catégorie->cat_ID;
				$sitemap_category_name 		= $catégorie->name;
				$lien						= get_category_link($sitemap_category_ID);
				
				//On la supprime du tableau
				array_splice($this->catégories, $indice, 1);
				
				//Génération du code pour les catégories enfant.
				$enfants = $this->chargerCatégorie($sitemap_category_ID);
				
				$html .= "
					<li>
						<a href=\"$lien\" title=\"$sitemap_category_name\" style=\"text-transform:uppercase; font-weight: bold;\">$sitemap_category_name</a>
						$enfants
					</li>
				";
				
				//On poursuite notre recherche de sous-catégories
				$indice = $this->stdClassArray_search($this->catégories, "parent", $cat_ID);
			}
			
			//Listing des articles rattachées à la catégorie
			$myposts = get_posts( array( 'showposts' => -1, 'orderby' => 'title', 'order' => 'ASC', 'category' => $cat_ID, 'post__not_in' => $this->posts_id ) );
			foreach ( $myposts as $post ){
				$id		= $post->ID;
				$titre 	= $post->post_title;
				$lien 	= apply_filters('the_permalink', get_permalink($id));
				
				$html .= "<li><a href=\"$lien\" title=\"$titre\">$titre</a></li>";
				
				$this->posts_id[] = $id;
			}
			
			$html .= "</ul>";
			return $html;
		}
		
		public function __toString(){
			$titre_pages = __('All Pages');
			$titre_articles = __('All Posts');
			
			//Liste HTML des articles rangés dans leurs catégories
			$articles = $this->chargerCatégorie();
			
			//Liste HTML des pages
			$pages = $this->chargerPages();
			
			$html = "
				<h2>$titre_pages</h2>
				$pages
				
				<h2>$titre_articles</h2>
				$articles
			";
			
			return $html;
		}
	}
	
}

?>