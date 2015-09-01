<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_f35cb6c479ac082a88b58d5507f105405fbd33083d138615d958d808753e4701 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_52f98acb725d897c77beb218b62bc23cbc37c9e075446232b256e95e096d4620 = $this->env->getExtension("native_profiler");
        $__internal_52f98acb725d897c77beb218b62bc23cbc37c9e075446232b256e95e096d4620->enter($__internal_52f98acb725d897c77beb218b62bc23cbc37c9e075446232b256e95e096d4620_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_52f98acb725d897c77beb218b62bc23cbc37c9e075446232b256e95e096d4620->leave($__internal_52f98acb725d897c77beb218b62bc23cbc37c9e075446232b256e95e096d4620_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_ce4002110f0aacd9f1344790ba312bc3959ece2be5b1ca5f79c8193d465c6e34 = $this->env->getExtension("native_profiler");
        $__internal_ce4002110f0aacd9f1344790ba312bc3959ece2be5b1ca5f79c8193d465c6e34->enter($__internal_ce4002110f0aacd9f1344790ba312bc3959ece2be5b1ca5f79c8193d465c6e34_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_ce4002110f0aacd9f1344790ba312bc3959ece2be5b1ca5f79c8193d465c6e34->leave($__internal_ce4002110f0aacd9f1344790ba312bc3959ece2be5b1ca5f79c8193d465c6e34_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_d814a19cd1bc7d98ae78d96c400e702637ca0bdda8df8b8684e424f071a34aff = $this->env->getExtension("native_profiler");
        $__internal_d814a19cd1bc7d98ae78d96c400e702637ca0bdda8df8b8684e424f071a34aff->enter($__internal_d814a19cd1bc7d98ae78d96c400e702637ca0bdda8df8b8684e424f071a34aff_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_d814a19cd1bc7d98ae78d96c400e702637ca0bdda8df8b8684e424f071a34aff->leave($__internal_d814a19cd1bc7d98ae78d96c400e702637ca0bdda8df8b8684e424f071a34aff_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_6b7a371105ca7425a1bde87af0e763033662c2cbb5c717d2d1c2cabeaf3595c9 = $this->env->getExtension("native_profiler");
        $__internal_6b7a371105ca7425a1bde87af0e763033662c2cbb5c717d2d1c2cabeaf3595c9->enter($__internal_6b7a371105ca7425a1bde87af0e763033662c2cbb5c717d2d1c2cabeaf3595c9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_6b7a371105ca7425a1bde87af0e763033662c2cbb5c717d2d1c2cabeaf3595c9->leave($__internal_6b7a371105ca7425a1bde87af0e763033662c2cbb5c717d2d1c2cabeaf3595c9_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
