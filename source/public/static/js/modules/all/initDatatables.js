(function(){define(["datatables"],function(){var a,t,e,l,n;return console.log("initDatatables..."),n={table:".js-datatable"},t={},window.table={},a=function(){t.table=$(n.table)},e={makeTables:function(){var a,e,l,n,i,o,s;if(t.table.is(":visible")){e=t.table.attr("data-cols"),s=t.table.attr("data-url"),n=t.table.attr("id"),a=e.split(","),o=[],l=0;for(i in a)o.push({data:a[i]});window.table[n]=t.table.DataTable({oLanguage:{sUrl:"//cdn.datatables.net/plug-ins/1.10.7/i18n/Spanish.json"},processing:!0,serverSide:!0,ordering:!1,searching:!0,bLengthChange:!1,ajax:{url:s},columns:o}),$(".search").keyup(function(){return window.table[n].search($(this).val()).draw(),console.log("tabla")}),console.log(n),console.log(window.table[n])}}},l=function(){a(),e.makeTables()},{init:l()}})}).call(this);