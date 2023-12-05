<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ListProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $commission_tax_list = array(
            array('id' => 1, 'name' => 'Sin Impuesto'),
            array('id' => 2, 'name' => 'Honorario'),
            array('id' => 3, 'name' => 'IVA 19%')
        );
        $account_type_list = array(
            array('id' => 1, 'name' => 'Ahorro'),
            array('id' => 2, 'name' => 'Corriente'),
            array('id' => 3, 'name' => 'Vista')
        );
        $property_type_list = array(
            array('id' => 1, 'name' => 'Oficina'),
            array('id' => 2, 'name' => 'Local'),
            array('id' => 3, 'name' => 'Sitio'),
            array('id' => 4, 'name' => 'Casa'),
            array('id' => 5, 'name' => 'Departamento'),
            array('id' => 6, 'name' => 'Estacionamiento'),
        );
        $subclasification_list = array(
            array('id' => 1, 'name' => 'Sin Amoblar'),
            array('id' => 2, 'name' => 'Amoblado'),
            array('id' => 3, 'name' => 'Sin Amoblar DFL2'),
            array('id' => 4, 'name' => 'Amoblado DFL2'),
        );
        $renewal_alert_list = array(
            array('id' => 30, 'name' => '30 Días'),
            array('id' => 45, 'name' => '45 Días'),
            array('id' => 60, 'name' => '60 Días'),
            array('id' => 90, 'name' => '90 Días'),
            array('id' => 120, 'name' => '120 Días'),
            array('id' => 180, 'name' => '180 Días'),
            array('id' => 190, 'name' => '190 Días'),
            array('id' => 365, 'name' => '365 Días'),
        );
        $lease_adjustment_type_list = array(
            array('id' => 1, 'name' => 'Anual'),
            array('id' => 2, 'name' => 'Semestral'),
            array('id' => 3, 'name' => 'Cuatrimestral'),
            array('id' => 4, 'name' => 'Trimestral'),
        );
        $lease_adjustment_month_list = array(
            array('id' => '01', 'name' => 'Enero'),
            array('id' => '02', 'name' => 'Febrero'),
            array('id' => '03', 'name' => 'Marzo'),
            array('id' => '04', 'name' => 'Abril'),
            array('id' => '05', 'name' => 'Mayo'),
            array('id' => '06', 'name' => 'Junio'),
            array('id' => '07', 'name' => 'Julio'),
            array('id' => '08', 'name' => 'Agosto'),
            array('id' => '09', 'name' => 'Septiembre'),
            array('id' => '10', 'name' => 'Octubre'),
            array('id' => '11', 'name' => 'Noviembre'),
            array('id' => '12', 'name' => 'Diciembre'),
        );
        $view = view();
        $view->share('commission_tax_list', $commission_tax_list);
        $view->share('account_type_list', $account_type_list);
        $view->share('property_type_list', $property_type_list);
        $view->share('subclasification_list', $subclasification_list);
        $view->share('renewal_alert_list', $renewal_alert_list);
        $view->share('lease_adjustment_type_list', $lease_adjustment_type_list);
        $view->share('lease_adjustment_month_list', $lease_adjustment_month_list);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
