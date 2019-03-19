<?php

/* @FOSUser/Security/login.html.twig */
class __TwigTemplate_bb1063dea5f0e445f2a7adde28d98faa450d472be4847d86a04e1a4a71a18b1c extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "@FOSUser/Security/login.html.twig", 1);
        $this->blocks = [
            'fos_user_content' => [$this, 'block_fos_user_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@FOSUser/Security/login.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@FOSUser/Security/login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_fos_user_content($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 4
        echo "
        <body class=\"hold-transition login-page\">

        ";
        // line 7
        if ((isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new Twig_Error_Runtime('Variable "error" does not exist.', 7, $this->source); })())) {
            // line 8
            echo "            <div>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new Twig_Error_Runtime('Variable "error" does not exist.', 8, $this->source); })()), "messageKey", []), twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new Twig_Error_Runtime('Variable "error" does not exist.', 8, $this->source); })()), "messageData", []), "security"), "html", null, true);
            echo "</div>
        ";
        }
        // line 10
        echo "
        <div class=\"login-box\">

        <div class=\"login-logo\">
            <a href=\"\"><img src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("templates/dist/img/logo.png"), "html", null, true);
        echo "\" alt=\"logo\" /></a>
        </div>
        <!-- /.login-logo -->
        <div class=\"login-box-body\">
        <p class=\"login-box-msg\">Connectez-vous pour commencer votre session</p>

        <form action=\"";
        // line 20
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fos_user_security_check");
        echo "\" method=\"post\">

            <div class=\"form-group has-feedback\">
                <input type=\"text\" class=\"form-control\" id=\"username\" name=\"_username\" placeholder=\"Adresse Mail\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new Twig_Error_Runtime('Variable "last_username" does not exist.', 23, $this->source); })()), "html", null, true);
        echo "\" required=\"required\" autocomplete=\"username\" />
                <span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span>
            </div>

            <div class=\"form-group has-feedback\">
                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"_password\" placeholder=\"Mot de passe\" required=\"required\" autocomplete=\"current-password\" />
                <span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>
            </div>

            <div class=\"row\">
                <div class=\"col-xs-8\">
                    <div class=\"checkbox icheck\">
                        <label>
                            <input type=\"checkbox\"> Se souvenir
                        </label>
                    </div>
                </div>

                <input type=\"hidden\" name=\"_csrf_token\"
                       value=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\"
                >

                <!-- /.col -->
                <div class=\"col-xs-4\">
                    <button type=\"submit\" class=\"btn btn-primary btn-block btn-flat\">Connection</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

            <div class=\"social-auth-links text-center\">
                <p>- OU -</p>
                ";
        // line 56
        echo "                    ";
        // line 57
        echo "                <a href=\"#\" class=\"btn btn-block btn-social btn-google btn-flat\"><i class=\"fa fa-google-plus\"></i> S'enregistrer avec Google+</a>
            </div>
            <!-- /.social-auth-links -->

            <a href=\"";
        // line 61
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fos_user_resetting_request");
        echo "\">J'ai oublié mon mot de passe</a><br>
            <a href=\"";
        // line 62
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fos_user_registration_register");
        echo "\" class=\"text-center\">Enregistrer un nouveau membre</a>

        </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@FOSUser/Security/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 62,  133 => 61,  127 => 57,  125 => 56,  109 => 42,  87 => 23,  81 => 20,  72 => 14,  66 => 10,  60 => 8,  58 => 7,  53 => 4,  44 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout.html.twig\" %}

    {% block fos_user_content %}

        <body class=\"hold-transition login-page\">

        {% if error %}
            <div>{{ error.messageKey|trans(error.messageData, 'security') }}</div>
        {% endif %}

        <div class=\"login-box\">

        <div class=\"login-logo\">
            <a href=\"\"><img src=\"{{ asset('templates/dist/img/logo.png') }}\" alt=\"logo\" /></a>
        </div>
        <!-- /.login-logo -->
        <div class=\"login-box-body\">
        <p class=\"login-box-msg\">Connectez-vous pour commencer votre session</p>

        <form action=\"{{ path(\"fos_user_security_check\") }}\" method=\"post\">

            <div class=\"form-group has-feedback\">
                <input type=\"text\" class=\"form-control\" id=\"username\" name=\"_username\" placeholder=\"Adresse Mail\" value=\"{{ last_username }}\" required=\"required\" autocomplete=\"username\" />
                <span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span>
            </div>

            <div class=\"form-group has-feedback\">
                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"_password\" placeholder=\"Mot de passe\" required=\"required\" autocomplete=\"current-password\" />
                <span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>
            </div>

            <div class=\"row\">
                <div class=\"col-xs-8\">
                    <div class=\"checkbox icheck\">
                        <label>
                            <input type=\"checkbox\"> Se souvenir
                        </label>
                    </div>
                </div>

                <input type=\"hidden\" name=\"_csrf_token\"
                       value=\"{{ csrf_token('authenticate') }}\"
                >

                <!-- /.col -->
                <div class=\"col-xs-4\">
                    <button type=\"submit\" class=\"btn btn-primary btn-block btn-flat\">Connection</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

            <div class=\"social-auth-links text-center\">
                <p>- OU -</p>
                {#<a href=\"#\" class=\"btn btn-block btn-social btn-facebook btn-flat\"><i class=\"fa fa-facebook\"></i> Sign in using#}
                    {#Facebook</a>#}
                <a href=\"#\" class=\"btn btn-block btn-social btn-google btn-flat\"><i class=\"fa fa-google-plus\"></i> S'enregistrer avec Google+</a>
            </div>
            <!-- /.social-auth-links -->

            <a href=\"{{ path('fos_user_resetting_request') }}\">J'ai oublié mon mot de passe</a><br>
            <a href=\"{{ path('fos_user_registration_register') }}\" class=\"text-center\">Enregistrer un nouveau membre</a>

        </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

    {% endblock fos_user_content %}", "@FOSUser/Security/login.html.twig", "/Applications/MAMP/htdocs/2018-l3ac1/branches/Publish/app/Resources/FOSUserBundle/views/Security/login.html.twig");
    }
}
