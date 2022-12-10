<?php
/*
Template Name: LOAN CALCULATOR
*/
if (!defined('ABSPATH')) {
  die;
}
the_content();
?>
<style>
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,regular,500,600,700,800,300italic,italic,500italic,600italic,700italic,800italic);

  h1 {
    font-weight: inherit;
  }

  body {
    font-family: "Open Sans";
  }

  .loan-calculator {
    width: 600px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    margin: 45px auto;
    border: 1px solid #d9d9d9;
    border-radius: 7px;
    -webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4117647059);
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4117647059);
  }

  .loan-calculator__header {
    text-align: center;
    margin: 25px 30px 50px;
    padding: 10px;
    border-radius: 3px;
    background-color: rgba(0, 102, 255, 0.5411764706);
    color: #fff;
    font-weight: 900;
  }

  .loan-calculator__body {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    font-size: 18px;
    font-weight: 100;
  }

  .loan-calculator__item {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    height: 50px;
    margin: 10px 30px;
  }

  .loan-calculator__item-title {
    text-align: left;
  }

  .loan-calculator__item-count {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: end;
    -ms-flex-pack: end;
    justify-content: end;
    position: relative;
  }

  .loan-calculator__item-count input {
    padding: 0 10px;
    font-size: 18px;
    height: 100%;
    text-align: center;
    outline: none;
    width: 100%;
  }

  .loan-calculator__item-title,
  .loan-calculator__item-count {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 50%;
    border-bottom: 1px solid #d9d9d9;
    padding: 0 10px;
    height: 30px;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
  }

  .loan-calculator__footer {
    margin-top: 20px;
    margin-bottom: 15px;
    font-weight: 800;
  }

  .loan-calculator__item-calculate {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 0px;
    flex: 1 1 0px;
    background-color: rgba(255, 217, 102, 0.5411764706);
  }

  .loan-calculator__item-reset {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 0px;
    flex: 1 1 0px;
    background-color: rgba(237, 125, 49, 0.5411764706);
  }

  .loan-calculator__item-calculate,
  .loan-calculator__item-reset {
    text-align: center;
    padding: 15px 7px;
    margin: 0 50px;
    cursor: pointer;
  }

  .number-minus,
  .number-plus,
  .loan-calculator__item-calculate,
  .loan-calculator__item-reset {
    border-radius: 3px;
    -webkit-transition: 0.27s;
    transition: 0.27s;
  }

  .number-minus:hover,
  .number-plus:hover,
  .loan-calculator__item-calculate:hover,
  .loan-calculator__item-reset:hover {
    -webkit-box-shadow: 0 0 7px rgb(137, 137, 137);
    box-shadow: 0 0 7px rgb(137, 137, 137);
  }

  .loan-calculator__err {
    display: none;
    font-size: 13px;
    color: #f70000;
    position: absolute;
    top: -35px;
    left: 19px;
    width: 250px;
    background-color: rgb(255, 236, 236);
    padding: 5px 10px;
    line-height: 1.3;
    font-weight: 400;
  }

  .number input[type=number] {
    display: block;
    width: 100%;
    padding: 0;
    margin: 0;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    text-align: center;
    -moz-appearance: textfield;
    -webkit-appearance: textfield;
    appearance: textfield;
  }

  .number input[type=number]::-webkit-outer-spin-button,
  .number input[type=number]::-webkit-inner-spin-button {
    display: none;
  }

  .number-minus {
    left: 1px;
    bottom: 1px;
  }

  .number-plus {
    right: 1px;
    bottom: 1px;
  }

  .number-minus,
  .number-plus {
    display: block;
    position: absolute;
    text-align: center;
    padding: 0;
    border: none;
    font-size: 16px;
    font-weight: 600;
    width: 40px;
    height: 40px;
    margin: 0 40px;
    cursor: pointer;
  }

  .loan-calculator__item-count input {
    color: #4f4f4f;
  }

  @media (max-width: 700px) {
    .loan-calculator {
      width: 370px;
    }

    .loan-calculator__item {
      margin: 10px 5px;
    }

    .loan-calculator__item-title,
    .loan-calculator__item-count {
      height: 65px;
    }

    .loan-calculator__item-calculate,
    .loan-calculator__item-reset {
      margin: 0 10px;
    }

    .loan-calculator__err {
      font-size: 14px;
      top: 0px;
      left: -179px;
      width: 358px;
    }

    .number-minus,
    .number-plus {
      margin: 0 0px;
    }
  }
</style>
<div class="loan-calculator">
  <div class="loan-calculator__header">
    <h1>LOAN CALCULATOR</h1>
  </div>
  <div class="loan-calculator__body">
    <div class="loan-calculator__item">
      <div class="loan-calculator__item-title">Interest Rate</div>
      <div class="loan-calculator__item-count number">
        <!-- <button class="number-minus" type="button" onclick="this.nextElementSibling.stepDown();">-</button> -->
        <input class="loan-calculator__rate" type="number" value="0.007" step="0.001" readonly />
        <!-- <button class="number-plus" type="button" onclick="this.previousElementSibling.stepUp();">+</button> -->
      </div>
    </div>
    <div class="loan-calculator__item">
      <div class="loan-calculator__item-title">Loan Amount</div>
      <!-- between 1000 and 1 million in multiple of 1,000 -->
      <div class="loan-calculator__item-count number">
        <button class="number-minus" type="button" onclick="this.nextElementSibling.stepDown();">-</button>
        <input class="loan-calculator__loan-amount" type="number" value="100000" min="1000" max="1000000" step="1000" />
        <button class="number-plus" type="button" onclick="this.previousElementSibling.stepUp();">+</button>
      </div>
    </div>
    <div class="loan-calculator__item">
      <div class="loan-calculator__item-title">No of instalments(Months)</div>
      <!-- maximum 200 months -->
      <div class="loan-calculator__item-count number">
        <button class="number-minus" type="button" onclick="this.nextElementSibling.stepDown();">-</button>
        <input class="loan-calculator__months" type="number" value="50" min="0" max="200" />
        <button class="number-plus" type="button" onclick="this.previousElementSibling.stepUp();">+</button>
      </div>
    </div>
    <div class="loan-calculator__item">
      <div class="loan-calculator__item-title">Monthly intalment(RS.)</div>
      <!-- displayed only if whole number  -->
      <div class="loan-calculator__item-count">
        <span class="loan-calculator__err">Monthly instalment should be a whole number. Please modify either Loan amount or No. of Instalments.</span>
        <input class="loan-calculator__result" type="number" value="2700" readonly />
      </div>
    </div>
  </div>
  <div class="loan-calculator__footer">
    <div class="loan-calculator__item">
      <div class="loan-calculator__item-calculate">CALCULATE</div>
      <div class="loan-calculator__item-reset">RESET</div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.loan-calculator__item-calculate').on('click', calc);
      $('.loan-calculator__item-reset').on('click', reset);

      let loanAmountMin = $('.loan-calculator__loan-amount').attr('min');
      let loanAmountMax = $('.loan-calculator__loan-amount').attr('max');
      let monthsMin = $('.loan-calculator__months').attr('min');
      let monthsMax = $('.loan-calculator__months').attr('max');
      let result = 0;

      function calc() {
        let rate = $('.loan-calculator__rate').val();
        let loanAmount = $('.loan-calculator__loan-amount').val();
        let months = $('.loan-calculator__months').val();
        result = rate * loanAmount + loanAmount / months;
        if (Number.isInteger(result) & (+loanAmount >= +loanAmountMin) & (+loanAmount <= +loanAmountMax) & (+months >= +monthsMin) & (+months <= +monthsMax)) {
          $('.loan-calculator__err').hide();
        } else {
          if (+loanAmount <= +loanAmountMin) {} else {
            $('.loan-calculator__err').show();
          }
        }
        $('.loan-calculator__result').val(result);
      }

      function reset() {
        $('.loan-calculator__rate').val(0.007);
        $('.loan-calculator__loan-amount').val(100000);
        $('.loan-calculator__months').val(50);
        $('.loan-calculator__result').val(2700);
        $('.loan-calculator__err').hide();
      }
    });
  </script>
</div>