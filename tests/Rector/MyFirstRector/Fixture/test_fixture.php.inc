<?php

namespace RectorSandbox\Rector\MyFirstRector\Fixture;

use RectorSandbox\Rector\Fixture\User;

class SomeClass
{
    public function handlePasswordChange(User $user, string $password)
    {
        $user->setPassword($password);
    }
}

?>
-----
<?php

namespace RectorSandbox\Rector\MyFirstRector\Fixture;

use RectorSandbox\Rector\Fixture\User;

class SomeClass
{
    public function handlePasswordChange(User $user, string $password)
    {
        $user->changePassword($password);
    }
}

?>
