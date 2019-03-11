<?php

/* bootstrap_4_horizontal_layout.html.twig */
class __TwigTemplate_db099886a1e23f62675ff5802fc450c386da800de504457b04bf4a1d9a89731a extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $_trait_0 = $this->loadTemplate("bootstrap_4_layout.html.twig", "bootstrap_4_horizontal_layout.html.twig", 1);
        // line 1
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."bootstrap_4_layout.html.twig".'" cannot be used as a trait.', 1, $this->source);
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            [
                'form_label' => [$this, 'block_form_label'],
                'form_label_class' => [$this, 'block_form_label_class'],
                'form_row' => [$this, 'block_form_row'],
                'fieldset_form_row' => [$this, 'block_fieldset_form_row'],
                'submit_row' => [$this, 'block_submit_row'],
                'reset_row' => [$this, 'block_reset_row'],
                'form_group_class' => [$this, 'block_form_group_class'],
                'checkbox_row' => [$this, 'block_checkbox_row'],
            ]
        );
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 2
        echo "
";
        // line 4
        echo "
";
        // line 5
        $this->displayBlock('form_label', $context, $blocks);
        // line 16
        echo "
";
        // line 17
        $this->displayBlock('form_label_class', $context, $blocks);
        // line 20
        echo "
";
        // line 22
        echo "
";
        // line 23
        $this->displayBlock('form_row', $context, $blocks);
        // line 35
        echo "
";
        // line 36
        $this->displayBlock('fieldset_form_row', $context, $blocks);
        // line 46
        echo "
";
        // line 47
        $this->displayBlock('submit_row', $context, $blocks);
        // line 55
        echo "
";
        // line 56
        $this->displayBlock('reset_row', $context, $blocks);
        // line 64
        echo "
";
        // line 65
        $this->displayBlock('form_group_class', $context, $blocks);
        // line 68
        echo "
";
        // line 69
        $this->displayBlock('checkbox_row', $context, $blocks);
    }

    // line 5
    public function block_form_label($context, array $blocks = [])
    {
        // line 6
        if ((($context["label"] ?? null) === false)) {
            // line 7
            echo "<div class=\"";
            $this->displayBlock("form_label_class", $context, $blocks);
            echo "\"></div>";
        } else {
            // line 9
            if (( !(isset($context["expanded"]) || array_key_exists("expanded", $context)) ||  !($context["expanded"] ?? null))) {
                // line 10
                $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", []), "")) : ("")) . " col-form-label"))]);
            }
            // line 12
            $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["class" => twig_trim_filter(((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", []), "")) : ("")) . " ") .             $this->renderBlock("form_label_class", $context, $blocks)))]);
            // line 13
            $this->displayParentBlock("form_label", $context, $blocks);
        }
    }

    // line 17
    public function block_form_label_class($context, array $blocks = [])
    {
        // line 18
        echo "col-sm-2";
    }

    // line 23
    public function block_form_row($context, array $blocks = [])
    {
        // line 24
        if (((isset($context["expanded"]) || array_key_exists("expanded", $context)) && ($context["expanded"] ?? null))) {
            // line 25
            $this->displayBlock("fieldset_form_row", $context, $blocks);
        } else {
            // line 27
            echo "<div class=\"form-group row";
            if ((( !($context["compound"] ?? null) || (((isset($context["force_error"]) || array_key_exists("force_error", $context))) ? (_twig_default_filter(($context["force_error"] ?? null), false)) : (false))) &&  !($context["valid"] ?? null))) {
                echo " is-invalid";
            }
            echo "\">";
            // line 28
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label');
            // line 29
            echo "<div class=\"";
            $this->displayBlock("form_group_class", $context, $blocks);
            echo "\">";
            // line 30
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
            // line 31
            echo "</div>
    ";
            // line 32
            echo "</div>";
        }
    }

    // line 36
    public function block_fieldset_form_row($context, array $blocks = [])
    {
        // line 37
        echo "<fieldset class=\"form-group\">
        <div class=\"row";
        // line 38
        if ((( !($context["compound"] ?? null) || (((isset($context["force_error"]) || array_key_exists("force_error", $context))) ? (_twig_default_filter(($context["force_error"] ?? null), false)) : (false))) &&  !($context["valid"] ?? null))) {
            echo " is-invalid";
        }
        echo "\">";
        // line 39
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label');
        // line 40
        echo "<div class=\"";
        $this->displayBlock("form_group_class", $context, $blocks);
        echo "\">";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 42
        echo "</div>
        </div>
";
        // line 44
        echo "</fieldset>";
    }

    // line 47
    public function block_submit_row($context, array $blocks = [])
    {
        // line 48
        echo "<div class=\"form-group row\">";
        // line 49
        echo "<div class=\"";
        $this->displayBlock("form_label_class", $context, $blocks);
        echo "\"></div>";
        // line 50
        echo "<div class=\"";
        $this->displayBlock("form_group_class", $context, $blocks);
        echo "\">";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 52
        echo "</div>";
        // line 53
        echo "</div>";
    }

    // line 56
    public function block_reset_row($context, array $blocks = [])
    {
        // line 57
        echo "<div class=\"form-group row\">";
        // line 58
        echo "<div class=\"";
        $this->displayBlock("form_label_class", $context, $blocks);
        echo "\"></div>";
        // line 59
        echo "<div class=\"";
        $this->displayBlock("form_group_class", $context, $blocks);
        echo "\">";
        // line 60
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 61
        echo "</div>";
        // line 62
        echo "</div>";
    }

    // line 65
    public function block_form_group_class($context, array $blocks = [])
    {
        // line 66
        echo "col-sm-10";
    }

    // line 69
    public function block_checkbox_row($context, array $blocks = [])
    {
        // line 70
        echo "<div class=\"form-group row\">";
        // line 71
        echo "<div class=\"";
        $this->displayBlock("form_label_class", $context, $blocks);
        echo "\"></div>";
        // line 72
        echo "<div class=\"";
        $this->displayBlock("form_group_class", $context, $blocks);
        echo "\">";
        // line 73
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 74
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        // line 75
        echo "</div>";
        // line 76
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "bootstrap_4_horizontal_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  245 => 76,  243 => 75,  241 => 74,  239 => 73,  235 => 72,  231 => 71,  229 => 70,  226 => 69,  222 => 66,  219 => 65,  215 => 62,  213 => 61,  211 => 60,  207 => 59,  203 => 58,  201 => 57,  198 => 56,  194 => 53,  192 => 52,  190 => 51,  186 => 50,  182 => 49,  180 => 48,  177 => 47,  173 => 44,  169 => 42,  167 => 41,  163 => 40,  161 => 39,  156 => 38,  153 => 37,  150 => 36,  145 => 32,  142 => 31,  140 => 30,  136 => 29,  134 => 28,  128 => 27,  125 => 25,  123 => 24,  120 => 23,  116 => 18,  113 => 17,  108 => 13,  106 => 12,  103 => 10,  101 => 9,  96 => 7,  94 => 6,  91 => 5,  87 => 69,  84 => 68,  82 => 65,  79 => 64,  77 => 56,  74 => 55,  72 => 47,  69 => 46,  67 => 36,  64 => 35,  62 => 23,  59 => 22,  56 => 20,  54 => 17,  51 => 16,  49 => 5,  46 => 4,  43 => 2,  18 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "bootstrap_4_horizontal_layout.html.twig", "/Applications/MAMP/htdocs/Publish/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Resources/views/Form/bootstrap_4_horizontal_layout.html.twig");
    }
}
