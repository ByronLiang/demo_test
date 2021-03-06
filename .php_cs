<?php

$rules = [
    '@PSR2' => true,
    'array_syntax' => [
        'syntax' => 'short',
    ],
    'binary_operator_spaces' => [
        'align_double_arrow' => false,
        'align_equals' => false,
    ],
    'blank_line_after_opening_tag' => true,
    'blank_line_before_return' => true,
    'cast_spaces' => true,
    'class_keyword_remove' => false,
    'combine_consecutive_unsets' => true,
    'concat_space' => [
        'spacing' => 'none',
    ],
    'declare_equal_normalize' => true,
    'declare_strict_types' => false,
    'dir_constant' => false,
    'function_typehint_space' => true,
    'general_phpdoc_annotation_remove' => false,
    'hash_to_slash_comment' => true,
    'header_comment' => false,
    'heredoc_to_nowdoc' => false,
    'include' => true,
    'linebreak_after_opening_tag' => true,
    'lowercase_cast' => true,
    'mb_str_functions' => false,
    'method_separation' => true,
    'modernize_types_casting' => false,
    'native_function_casing' => true,
    'new_with_braces' => false,
    'no_alias_functions' => false,
    'no_blank_lines_after_class_opening' => true,
    'no_blank_lines_after_phpdoc' => true,
    'no_blank_lines_before_namespace' => false,
    'no_empty_comment' => false,
    'no_empty_phpdoc' => false,
    'no_empty_statement' => true,
    'no_extra_consecutive_blank_lines' => [
        'break',
        'continue',
        'curly_brace_block',
        'extra',
        'return',
        'square_brace_block',
        'throw',
        'use',
        'useTrait',
    ],
    'no_leading_import_slash' => true,
    'no_leading_namespace_whitespace' => true,
    'no_mixed_echo_print' => [
        'use' => 'echo',
    ],
    'no_multiline_whitespace_around_double_arrow' => true,
    'no_multiline_whitespace_before_semicolons' => true,
    'no_php4_constructor' => false,
    'no_short_bool_cast' => true,
    'no_short_echo_tag' => true,
    'no_singleline_whitespace_before_semicolons' => true,
    'no_spaces_around_offset' => true,
    'no_trailing_comma_in_list_call' => true,
    'no_trailing_comma_in_singleline_array' => true,
    'no_unneeded_control_parentheses' => true,
    'no_unreachable_default_argument_value' => false,
    'no_unused_imports' => true,
    'no_useless_else' => false,
    'no_useless_return' => true,
    'no_whitespace_before_comma_in_array' => true,
    'no_whitespace_in_blank_line' => true,
    'normalize_index_brace' => true,
    'not_operator_with_space' => false,
    'not_operator_with_successor_space' => true,
    'object_operator_without_whitespace' => true,
    'ordered_class_elements' => false,
    'ordered_imports' => false,
    'php_unit_construct' => false,
    'php_unit_dedicate_assert' => false,
    'php_unit_fqcn_annotation' => true,
    'php_unit_strict' => false,
    'pow_to_exponentiation' => false,
    'pre_increment' => false,
    'protected_to_private' => true,
    'psr0' => false,
    'psr4' => false,
    'random_api_migration' => false,
    'return_type_declaration' => true,
    'self_accessor' => true,
    'semicolon_after_instruction' => true,
    'short_scalar_cast' => true,
    'silenced_deprecation_error' => false,
    'simplified_null_return' => false,
    'single_blank_line_before_namespace' => true,
    'single_quote' => true,
    'space_after_semicolon' => true,
    'standardize_not_equals' => true,
    'strict_comparison' => false,
    'strict_param' => false,
    'ternary_operator_spaces' => true,
    'trailing_comma_in_multiline_array' => true,
    'trim_array_spaces' => true,
    'unary_operator_spaces' => true,
    'whitespace_after_comma_in_array' => true,
];

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__);

return PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setFinder($finder);
