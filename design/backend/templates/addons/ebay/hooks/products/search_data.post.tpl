{capture name="ebay"}
    <div>
        <label for="elm_ebay_template_id">{__("ebay_template")}</label>
        <select name="ebay_template_id" id="elm_ebay_template_id">
            <option value="0">--</option>
            <option value="any" {if $search.ebay_template_id == 'any'}selected="selected"{/if}>{__("any")}</option>
            {foreach from=$ebay_templates key=key item="template"}
                <option value="{$key}" {if $search.ebay_template_id == $key}selected="selected"{/if}>
                    {$template}
                </option>
            {/foreach}
        </select>
    </div>
    <div>
        <label for="elm_ebay_status">{__("ebay_product_status")}</label>
        <select name="ebay_status" id="elm_ebay_status">
            <option value="">--</option>
            {foreach from=$ebay_product_statuses key=value item=status}
                <option value="{$value}"
                    {if $search.ebay_status == $value && $search.ebay_status != ""}selected="selected"{/if}
                >
                    {$status}
                </option>
            {/foreach}
        </select>
    </div>
    <div>
        <label for="ebay_change_products">{__("exported_to_ebay")}</label>
        <select name="ebay_update" id="ebay_change_products">
            <option value="">--</option>
            <option value="P" {if $search.ebay_update == "P"}selected="selected"{/if}>
                {__("all")}
            </option>
            <option value="W" {if $search.ebay_update == "W"}selected="selected"{/if}>
                {__("revised_after_the_latest_export")}
            </option>
        </select>
    </div>
{/capture}

{$search_filters.data.ebay = [
    id => "ebay",
    type => "dropdown",
    category => "secondary",
    label => __("ebay"),
    content => $smarty.capture.ebay
]}

{* Export *}
{$search_filters = $search_filters scope=parent}
