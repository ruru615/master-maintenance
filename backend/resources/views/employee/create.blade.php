<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<style>
  @media (min-width: 1200px) {
    #parent {
      display: flex;
      margin-left: 350px;
    }
    .form-group {
      display: inline;
    }
    #button {
      width: 300px;
      height: 30px;
      background: #C0C0C0;
      border-radius: 5px 5px 5px 5px;
    }
    #dropdown {
      width: 300px;
      height: 40px;
      border-radius: 5px 5px 5px 5px;
      border: 1px solid #ccc;
    }
    #checkbox {
      text-align: center;
      width: 50px;
    }
    .date-edit {
      position: relative;
    }
    .empNumber {
      text-align: right;
    }
    .text {
      width: 300px;
      height: 40px;
      border-radius: 5px 5px 5px 5px;
      border: 1px solid #ccc;
    }
    .nameText {
      width: 150px;
      height: 40px;
      border-radius: 5px 5px 5px 5px;
      border: 1px solid #ccc;
    }
    .date-edit::before {
      content: "";
      position: absolute;
      top: -15px;
      right: -65px;
      border-radius: 28px;
      height: 50px;
      width: 50px;
    }
    input[type="date"] {
      padding: 10px;
      height: 40px;
      text-align: center;
      border-radius: 5px 5px 5px 5px;
      border: 1px solid #ccc;
    }
  }
</style>

<h1>社員登録</h1>
@if ($errors->has('name'))
   <p class="validation">※{{$errors->first('name')}}</p>
@endif
<form action="{{ route('employee.store')}}" method="POST">
  @csrf
  @method('PUT')
  <div id=parent>
      <div style="flex-grow: 1;">
          <label><label style="color: red">※</label>社員ID</label>
          <p><input class="text" name="id" placeholder="20文字以内で入力"></p>
          <label><label style="color: red">※</label>入社年月日</label>
          <p><label class="date-edit"  name="enterDay"><input type="date"/></label></p>
          <p><label>姓</label><label style="margin-left: 150px;">名</label></p>
          <div class="form-group">
            <input class="nameText" name="lastName" placeholder="20文字以内で入力">
            <input class="nameText" name="firstName" placeholder="20文字以内で入力" >
          </div>
          <p><label>姓カナ</label><label style="margin-left: 120px;">名カナ</label></p>
          <div class="form-group">
            <input class="nameText" name="lastKana" placeholder="20文字以内で入力">
            <input class="nameText" name="firstKana" placeholder="20文字以内で入力">
          </div>
          <p><label>姓本名</label><label style="margin-left: 120px;">名本名</label></p>
          <div class="form-group">
            <input class="nameText" name="realLast" placeholder="20文字以内で入力">
            <input class="nameText" name="lastFirst" placeholder="20文字以内で入力">
          </div>
          <p><label>姓本名カナ</label><label style="margin-left: 85px;">名本名カナ</label></p>
          <div class="form-group"> 
            <input class="nameText" name="realLastKana" placeholder="20文字以内で入力">
            <input class="nameText" name="realFiestKana" placeholder="20文字以内で入力">
          </div>
          <p><label>配置場所名</label></p>
          <p><input class="text" name="assignName"placeholder="20文字以内で入力"></p>
          <label>役職区分</label>
          <p><select name="positionCategory" id="dropdown">
            <option value="-">-</option>
            <option value="C3">C3</option>
            <option value="M3">M3</option>
            <option value="S3">S3</option>
            <option value="M3">M3</option>
            <option value="P3">P3</option>
            <option value="PC">PC</option>
            <option value="GM">GM</option>
          </select></p>
          <label>役職開始日</label>
          <p><label class="date-edit"  name="positionStartDay"><input type="date"/></label></p>
          <label>勤務地①</label>
          <p><input class="text" name="workplace1" placeholder="50文字以内で入力"></p>
          <label>勤務地②</label>
          <p><input class="text" name="workplace2" placeholder="50文字以内で入力"></p>
          <label>勤務地③</label>
          <p><input class="text" name="workplace3" placeholder="50文字以内で入力"></p>
          <label>社用メールアドレス</label>
          <p><input class="text" name="companyMail"></p>
          <label>個人メールアドレス</label>
          <p><input class="text" name="privateMail"></p>
          <label>社用携帯電話番号（ハイフンなし）</label>
          <p><input class="text" name="companyMobile"></p>
          <label>個人携帯電話番号（ハイフンなし）</label>
          <p><input class="text" name="privateMobile"></p>
          <label>個人固定電話番号</label>
          <p><input class="text" name="privatetel"></p>
          <label>学歴区分</label>
          <p><select name="educationCategory" id="dropdown">
            <option value="-">-</option>
            <option value="highschool">高卒</option>
            <option value="businessschool">専門学校卒</option>
            <option value="collage">大卒</option>
            <option value="highcollage">院卒</option>
          </select></p>
          <label>最終学歴①（学校名）</label>
          <p><input class="text" name="finalEducation1" placeholder="30文字以内で入力"></p>
          <label>最終学歴②（学部名）※専門学校は学科名</label>
          <p><input class="text" name="finalEducation2" placeholder="20文字以内で入力"></p>
          <label>最終学歴③（学科名）※専門学校はコース名</label>
          <p><input class="text" name="finalEducation3" placeholder="20文字以内で入力"></p>
          <label>学歴卒業年（西暦）</label>
          <p><input class="text" name="educationYear"></p>
          <label>採用区分</label>
          <p><select name="hiringCategory" id="dropdown">
            <option value="-">-</option>
            <option value="new">新卒</option>
            <option value="old">中途</option>
          </select></p>
          <label>雇用区分</label>
          <p><select name="employeementCategory" id="dropdown">
            <option value="-">-</option>
            <option value="fulltime">正社員</option>
            <option value="contract">契約社員</option>
            <option value="parttime">パートタイマー</option>
            <option value="part">アルバイト</option>
            <option value="rehire">再雇用社員</option>
            <option value="dispatch">登録派遣社員</option>
            <option value="leave">退社</option>
          </select></p>
          <form action="{{ route('employee.index')}}" >
          @csrf
          <button type="button" id="button" onClick="history.back()">戻る</button>
          </form>
      </div>
      <div style="flex-grow: 1;">
          <label>生年月日</label>
          <p><label class="date-edit"  name="birthDay"><input type="date"/></label></p>
          <p><label>性別</label><label style="margin-left: 130px;">国籍</label></p>
          <div class="form-group">
            <input class="nameText" name="sexType">
            <input class="nameText" name="nationality">
          </div>
          <p><label>個人番号</label></p>
          <p><input class="text" name="personalNumber"></p>
          <p><label>血液型①</label><label style="margin-left: 90px;">血液型②</label></p>
          <div class="form-group">
            <input class="nameText" name="bloodType1">
            <input class="nameText" name="bloodType2">
          </div>
          <p><label>運転免許区分</label></p>
          <p><select name="driversLicenseCategory" id="dropdown">
            <option value="-">-</option>
            <option value="ordinary">普通免許</option>
            <option value="mediumLarge">中型・大型免許</option>
            <option value="motorcycle">二輪免許</option>
            <option value="moped">原付免許</option>
            <option value="nothing">無所持</option>
          </select></p>
          <label>運転免許証番号</label>
          <p><input class="text" name="driversLicenseNumber"></p>
          <label>障がい者手帳</label>
          <p><input type="checkbox" id="checkbox" name="yes" value="1">有
          <input type="checkbox" id="checkbox" name="no" value="2">無</p>
          <label>在留カード番号</label>
          <p><input class="text" name="residenceCardNumber"></p>
          <label>就労ビザ</label>
          <p><input type="checkbox" id="checkbox" name="yes" value="1">有
          <input type="checkbox" id="checkbox" name="no" value="2">無</p>
          <label>緊急連絡先①（ハイフンなし）</label>
          <p><input class="text" name="emergency2"></p>
          <label>緊急連絡先②（ハイフンなし）</label>
          <p><input class="text" name="emergency2"></p>
          <label>現住所郵便番号（ハイフンなし）</label>
          <p><input class="text" name="postalCode"></p>
          <label>現住所①</label>
          <p><input class="text" name="address1" placeholder="20文字以内で入力"></p>
          <label>現住所②</label>
          <p><input class="text" name="address2" placeholder="40文字以内で入力"></p>
          <label>現住所③</label>
          <p><input class="text" name="address3" placeholder="50文字以内で入力"></p>
          <label>世帯主</label>
          <p><input type="checkbox" id="checkbox" name="yes" value="1">はい
          <input type="checkbox" id="checkbox" name="no" value="2">いいえ</p>
          <label>給与番号</label>
          <p><input class="text" name="saralyNumber"></p>
          <label>年金番号</label>
          <p><input class="text" name="pensionNumber"></p>
          <label>保険証番号</label>
          <p><input class="text" name="insuranceNumber"></p>
          <label>休職</label>
          <p><input type="checkbox" id="checkbox" name="yes" value="1">休職中
          <input type="checkbox" id="checkbox" name="no" value="2">在職中</p>
          <label>休職開始日</label>
          <p><label class="date-edit"  name="leaveDate"><input type="date"/></label></p>
          <p><label>累計休職月数</label><label style="margin-left: 60px;">他社経験年数</label></p>
          <div class="form-group">
            <input class="nameText" name="leaveMonths">
            <input class="nameText" name="experienceYears" >
          </div>
          <p><label>退社年月日</label></p>
          <p><label class="date-edit"  name="exitDay"><input type="date"/></label></p>
          <form action="{{ route('employee.store') }}" method="POST">
          @csrf
          <input type="submit" id="button" style="margin-top: 160px;" value="登録する">
          </form>
      </div>  
  </div>
  @if ($message = Session::get('success'))
  <p>{{ $message }}</p>
  @endif
</form>