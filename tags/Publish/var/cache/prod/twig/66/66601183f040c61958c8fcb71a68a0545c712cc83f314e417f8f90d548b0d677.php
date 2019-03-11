<?php

/* @FOSUser/Registration/email.txt.twig */
class __TwigTemplate_983c81524150250fbaa8c46552f74136ebf3a0b711f203bd57056b68cec0c25a extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'subject' => [$this, 'block_subject'],
            'body_text' => [$this, 'block_body_text'],
            'body_html' => [$this, 'block_body_html'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 2
        $this->displayBlock('subject', $context, $blocks);
        // line 7
        echo "
";
        // line 8
        $this->displayBlock('body_text', $context, $blocks);
        // line 13
        $this->displayBlock('body_html', $context, $blocks);
    }

    // line 2
    public function block_subject($context, array $blocks = [])
    {
        // line 4
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("registration.email.subject", ["%username%" => twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "username", []), "%confirmationUrl%" => ($context["confirmationUrl"] ?? null)], "FOSUserBundle");
    }

    // line 8
    public function block_body_text($context, array $blocks = [])
    {
        // line 10
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("registration.email.message", ["%username%" => twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "username", []), "%confirmationUrl%" => ($context["confirmationUrl"] ?? null)], "FOSUserBundle");
        echo "
";
    }

    // line 13
    public function block_body_html($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "@FOSUser/Registration/email.txt.twig";
    }

    public function getDebugInfo()
    {
        return array (  53 => 13,  47 => 10,  44 => 8,  40 => 4,  37 => 2,  33 => 13,  31 => 8,  28 => 7,  26 => 2,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@FOSUser/Registration/email.txt.twig", "/Applications/MAMP/htdocs/Publish/vendor/friendsofsymfony/user-bundle/Resources/views/Registration/email.txt.twig");
    }
}
