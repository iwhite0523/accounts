<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
  private $color = 'black';
  private $amount = 0.0;

  protected $fillable = ['title', 'period_start'];

  public function setUser($user)
  {
    $this->user_id = $user;
  }

  public function addAccount(Account $account)
  {
    $this->accounts()->save($account);
  }

  public function accounts()
  {
    return $this->hasMany(Account::class);
  }

  public function setAmount()
  {
    $amount = 0;
    foreach ($this->accounts as $account) {
      $amount += $account->balance;
    }
    $this->amount = $amount;
  }

  public function getAmount()
  {
    return $this->amount;
  }

  /**
   *  Make sure everytime we want the color we explicitly check for it.
   *  The color should be determined by the account balance.
   *
   *  @return string
   */
  public function getColor()
  {
    if ($this->getAmount() == 0) {
      $this->setColor('black');
    } else {
      $this->getAmount() > 0 ? $this->setColor('green') : $this->setColor('red');
    }

    return $this->color;
  }

  /**
   *
   */
  public function setColor($color)
  {
    $this->color = $color;
  }
}
