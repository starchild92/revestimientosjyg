<?php

/* JYGRevestimientosBundle:Page:productos.html.twig */
class __TwigTemplate_1d7cd32538200e56e1abf71ebc452159ad4ac27a180ad48f13e6077a030311f9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("JYGRevestimientosBundle::base.html.twig", "JYGRevestimientosBundle:Page:productos.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "JYGRevestimientosBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_639ea9171a7a55a576597219d4c21945bbdd728f8b0ff8d0d3b22506f635b338 = $this->env->getExtension("native_profiler");
        $__internal_639ea9171a7a55a576597219d4c21945bbdd728f8b0ff8d0d3b22506f635b338->enter($__internal_639ea9171a7a55a576597219d4c21945bbdd728f8b0ff8d0d3b22506f635b338_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle:Page:productos.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_639ea9171a7a55a576597219d4c21945bbdd728f8b0ff8d0d3b22506f635b338->leave($__internal_639ea9171a7a55a576597219d4c21945bbdd728f8b0ff8d0d3b22506f635b338_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_54167fb40172fe31c7e8438952f28adbda977b910dff9727dacaa0f577483caf = $this->env->getExtension("native_profiler");
        $__internal_54167fb40172fe31c7e8438952f28adbda977b910dff9727dacaa0f577483caf->enter($__internal_54167fb40172fe31c7e8438952f28adbda977b910dff9727dacaa0f577483caf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Revestimientos J&G - Productos";
        
        $__internal_54167fb40172fe31c7e8438952f28adbda977b910dff9727dacaa0f577483caf->leave($__internal_54167fb40172fe31c7e8438952f28adbda977b910dff9727dacaa0f577483caf_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_70954cbe3b9bb51afe2a457296be8b2a56c6b1584b77a39d03a733c1e8982816 = $this->env->getExtension("native_profiler");
        $__internal_70954cbe3b9bb51afe2a457296be8b2a56c6b1584b77a39d03a733c1e8982816->enter($__internal_70954cbe3b9bb51afe2a457296be8b2a56c6b1584b77a39d03a733c1e8982816_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        echo "\t
\t<div class=\"container\">
\t\t<h1>Welcome to the Page:vision page</h1>
\t</div>
";
        
        $__internal_70954cbe3b9bb51afe2a457296be8b2a56c6b1584b77a39d03a733c1e8982816->leave($__internal_70954cbe3b9bb51afe2a457296be8b2a56c6b1584b77a39d03a733c1e8982816_prof);

    }

    public function getTemplateName()
    {
        return "JYGRevestimientosBundle:Page:productos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 5,  35 => 3,  11 => 1,);
    }
}
