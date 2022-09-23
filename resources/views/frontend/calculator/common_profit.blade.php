@php
$prevNetProfit = session()->get('netProfit');
$prevSalesEquivalent = session()->get('salesEquivalent');
$prevOldProfitMergin = session()->get('oldProfitMergin');
$prevNewProfitMergin = session()->get('newProfitMergin');
$prevLifeTimeValue = session()->get('lifeTimeValue');
$netProfit = round($result['net_profit']);
$salesEquivalent = round($result['revenue_equivalent']);
$oldProfitMergin = round($result['net_profit_margin']);
$newProfitMergin = round($result['new_net_profit_margin']);
$lifeTimeValue = round($result['life_time_value']);
session()->put('netProfit',$netProfit);
session()->put('salesEquivalent',$salesEquivalent);
session()->put('oldProfitMergin',$oldProfitMergin);
session()->put('newProfitMergin',$newProfitMergin);
session()->put('lifeTimeValue',$lifeTimeValue);
@endphp
<div class="common-profit-box row justify-content-center">
    <div class="common-profit-box-item col-auto">
        <div class="common-profit-box-shape" style="{{ ($netProfit > 0 || $netProfit < 0 ) && ($netProfit != $prevNetProfit) ? 'animation: 2s ease 0s 1 normal none running shadow2' : ''}}" >
            <div class="common-profit-box-shape-i"></div>
        </div>
        <div class="common-profit-box-label">NET PROFIT INCREASE</div>
        <div class="common-profit-box-value" id="net_profit_increase"><span class="count">{{round_price_format($netProfit)}}</span></div>
    </div>
    <div class="common-profit-box-item col-auto">
        <div class="common-profit-box-shape" style="{{ ($salesEquivalent > 0 || $salesEquivalent < 0 ) && ($salesEquivalent != $prevSalesEquivalent)  ? 'animation: 2s ease 0s 1 normal none running shadow2' : ''}}">
            <div class="common-profit-box-shape-i"></div>
        </div>
        <div class="common-profit-box-label"> SALES EQUIVALENT</div>
        <div class="common-profit-box-value" id="revenue_equivalent">{{round_price_format($salesEquivalent)}}</div>
    </div>
    <div class="common-profit-box-item col-auto">
        <div class="common-profit-box-shape" style="{{ ($oldProfitMergin > 0 || $oldProfitMergin < 0 ) && ($oldProfitMergin != $prevOldProfitMergin)  ? 'animation: 2s ease 0s 1 normal none running shadow2' : ''}}">
            <div class="common-profit-box-shape-i"></div>
        </div>
        <div class="common-profit-box-label"> OLD PROFIT MARGIN</div>
        <div class="common-profit-box-value" id="old_profit_margin"><span class="count">{{round($oldProfitMergin)}}</span>%</div>
    </div>
    <div class="common-profit-box-item col-auto">
        <div class="common-profit-box-shape" style="{{ ($newProfitMergin > 0 || $newProfitMergin < 0 ) && ($newProfitMergin != $prevNewProfitMergin)  ? 'animation: 2s ease 0s 1 normal none running shadow2' : ''}}">
            <div class="common-profit-box-shape-i"></div>
        </div>
        <div class="common-profit-box-label">NEW PROFIT MARGIN</div>
        <div class="common-profit-box-value" id="net_profit_margin"><span class="count">{{round($newProfitMergin)}}</span>%</div>
    </div>
    <div class="common-profit-box-item col-auto">
        <div class="common-profit-box-shape" style="{{ ($lifeTimeValue > 0 || $lifeTimeValue < 0 ) && ($lifeTimeValue != $prevLifeTimeValue)  ? 'animation: 2s ease 0s 1 normal none running shadow2' : ''}}">
            <div class="common-profit-box-shape-i"></div>
        </div>
        <div class="common-profit-box-label">LIFETIME VALUE</div>
        <div class="common-profit-box-value" id="lifetime_value"><span class="count">{{round_price_format($lifeTimeValue)}}</span></div>
    </div>
</div>