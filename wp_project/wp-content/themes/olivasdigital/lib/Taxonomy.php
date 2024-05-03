<?php

/**
 * olivasdigital
 *
 * WARNING: This file is part of the olivasdigital theme. DO NOT edit this file
 * under any circumstances, as the changes will be lost in the case of a theme update.
 * Please do all modifications in the form of a child theme.
 *
 * @since   1.0.0
 * @package OD
 * @author  Nucleus
 * @license GPL-2.0+
 * @link    http://nucleus.eti.br/
 */

namespace OD\Theme;

/**
 * Theme post types.
 *
 * @since  1.0.0
 */
class Taxonomy {

	public function __construct() {
		add_action( 'init', array( $this, 'register_taxonomies' ) );
	}

	public function register_taxonomies() {
		// CPT Projects
		$this->register(
			'projects-type',
			'Tipos',
			'Tipo',
			'projects'
		);
	}

	private function register( $name_slug, $name_plural, $name_singular, $name_cpt ) {
		register_taxonomy(
			$name_slug,
			$name_cpt,
			array(
				'labels'            => array(
					'name'                       => _x( $name_plural, 'Taxonomy General Name', 'olivasdigital' ),
					'singular_name'              => _x( $name_singular, 'Taxonomy Singular Name', 'olivasdigital' ),
					'menu_name'                  => __( $name_plural, 'olivasdigital' ),
					'all_items'                  => __( 'Todos os ' . $name_plural, 'olivasdigital' ),
					'parent_item'                => __( $name_singular . ' Pai', 'olivasdigital' ),
					'parent_item_colon'          => __( $name_singular . ' pai (dois pontos)', 'olivasdigital' ),
					'new_item_name'              => __( 'Nome do novo ' . $name_singular, 'olivasdigital' ),
					'add_new_item'               => __( 'Adicionar novo ' . $name_singular, 'olivasdigital' ),
					'edit_item'                  => __( 'Editar ' . $name_singular, 'olivasdigital' ),
					'update_item'                => __( 'Atualizar ' . $name_singular, 'olivasdigital' ),
					'view_item'                  => __( 'Ver ' . $name_singular, 'olivasdigital' ),
					'separate_items_with_commas' => __( 'Separe ' . $name_plural . ' com vírgulas', 'olivasdigital' ),
					'add_or_remove_items'        => __( 'Adicionar ou remover ' . $name_singular, 'olivasdigital' ),
					'choose_from_most_used'      => __( 'Escolha entre os ' . $name_plural . ' mais usados', 'olivasdigital' ),
					'popular_items'              => __( $name_singular . ' popular', 'olivasdigital' ),
					'search_items'               => __( 'Buscar ' . $name_singular, 'olivasdigital' ),
					'not_found'                  => __( $name_singular . ' não encontrado', 'olivasdigital' ),
					'no_terms'                   => __( 'Sem ' . $name_singular, 'olivasdigital' ),
					'items_list'                 => __( 'Lista de ' . $name_plural, 'olivasdigital' ),
					'items_list_navigation'      => __( 'Navegação na lista de ' . $name_plural, 'olivasdigital' ),
				),
				'hierarchical'      => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud'     => true,
				'query_var'         => false,
				'show_in_rest'      => true,
				'supports'          => array(
					'title'
				),
			)
		);
	}
}