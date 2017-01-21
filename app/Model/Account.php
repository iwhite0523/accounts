<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Account extends Model
{
  private $color = 'green';

  protected $fillable = ['title', 'balance', 'category'];

  public function setUser($user = 1)
  {
    $this->user_id = $user;
  }

  public function period()
  {
    return $this->belongsTo(Period::class);
  }

  public function setTitle($title)
  {
      if ($title == null) {
          throw new NotFoundHttpException;
      }

      $this->title = $title;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function setBalance($balance)
  {
      $this->balance = $balance;
  }

  public function getBalance()
  {
    return $this->balance;
  }

  /**
   *  Make sure everytime we want the color we explicitly check for it.
   *  The color should be determined by the account balance.
   *
   *  @return string
   */
  public function getColor()
  {
    if ($this->getBalance() == 0) {
      $this->setColor('black');
    } else {
      $this->getBalance() > 0 ? $this->setColor('green') : $this->setColor('red');
    }

    return $this->color;
  }

  /**
   *  This is private to make sure no one can set it outside of the value on the server.
   *
   *  @param string
   */
  private function setColor($color)
  {
    $this->color = $color;
  }
}
