<?php

namespace BMurphy\Models\Base;

/**
 * Base class of the BMurphy\Models\User entity.
 */
abstract class User implements \ArrayAccess
{
    protected $id;
    protected $username;
    protected $email;
    protected $salt;
    protected $password;
    protected $created;
    protected $updated;
    protected $clients;
    protected $codes;
    protected $tokens;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->clients = new \Doctrine\Common\Collections\ArrayCollection();
        $this->codes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tokens = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set the id column value.
     *
     * @param mixed $value The column value.
     */
    public function setId($value)
    {
        $this->id = $value;
    }

    /**
     * Returns the id column value.
     *
     * @return mixed The column value.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the username column value.
     *
     * @param mixed $value The column value.
     */
    public function setUsername($value)
    {
        $this->username = $value;
    }

    /**
     * Returns the username column value.
     *
     * @return mixed The column value.
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the email column value.
     *
     * @param mixed $value The column value.
     */
    public function setEmail($value)
    {
        $this->email = $value;
    }

    /**
     * Returns the email column value.
     *
     * @return mixed The column value.
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the salt column value.
     *
     * @param mixed $value The column value.
     */
    public function setSalt($value)
    {
        $this->salt = $value;
    }

    /**
     * Returns the salt column value.
     *
     * @return mixed The column value.
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set the password column value.
     *
     * @param mixed $value The column value.
     */
    public function setPassword($value)
    {
        $this->password = $value;
    }

    /**
     * Returns the password column value.
     *
     * @return mixed The column value.
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the created column value.
     *
     * @param mixed $value The column value.
     */
    public function setCreated($value)
    {
        $this->created = $value;
    }

    /**
     * Returns the created column value.
     *
     * @return mixed The column value.
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set the updated column value.
     *
     * @param mixed $value The column value.
     */
    public function setUpdated($value)
    {
        $this->updated = $value;
    }

    /**
     * Returns the updated column value.
     *
     * @return mixed The column value.
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set the clients association value.
     *
     * @param mixed $value The association value.
     */
    public function setClients($value)
    {
        $this->clients = $value;
    }

    /**
     * Returns the clients association value.
     *
     * @return mixed The association value.
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Set the codes association value.
     *
     * @param mixed $value The association value.
     */
    public function setCodes($value)
    {
        $this->codes = $value;
    }

    /**
     * Returns the codes association value.
     *
     * @return mixed The association value.
     */
    public function getCodes()
    {
        return $this->codes;
    }

    /**
     * Set the tokens association value.
     *
     * @param mixed $value The association value.
     */
    public function setTokens($value)
    {
        $this->tokens = $value;
    }

    /**
     * Returns the tokens association value.
     *
     * @return mixed The association value.
     */
    public function getTokens()
    {
        return $this->tokens;
    }

    /**
     * Set data by name.
     *
     * @param string $name  The data name.
     * @param mixed  $value The value.
     *
     * @throws \InvalidArgumentException If the data does not exists.
     */
    public function set($name, $value)
    {
        if ('id' == $name) {
            return $this->setId($value);
        }
        if ('username' == $name) {
            return $this->setUsername($value);
        }
        if ('email' == $name) {
            return $this->setEmail($value);
        }
        if ('salt' == $name) {
            return $this->setSalt($value);
        }
        if ('password' == $name) {
            return $this->setPassword($value);
        }
        if ('created' == $name) {
            return $this->setCreated($value);
        }
        if ('updated' == $name) {
            return $this->setUpdated($value);
        }
        if ('clients' == $name) {
            return $this->setClients($value);
        }
        if ('codes' == $name) {
            return $this->setCodes($value);
        }
        if ('tokens' == $name) {
            return $this->setTokens($value);
        }

        throw new \InvalidArgumentException(sprintf('The data "%s" does not exists.', $name));
    }

    /**
     * Get data by name.
     *
     * @param string $name  The data name.
     *
     * @return mixed The data.
     *
     * @throws \InvalidArgumentException If the data does not exists.
     */
    public function get($name)
    {
        if ('id' == $name) {
            return $this->getId();
        }
        if ('username' == $name) {
            return $this->getUsername();
        }
        if ('email' == $name) {
            return $this->getEmail();
        }
        if ('salt' == $name) {
            return $this->getSalt();
        }
        if ('password' == $name) {
            return $this->getPassword();
        }
        if ('created' == $name) {
            return $this->getCreated();
        }
        if ('updated' == $name) {
            return $this->getUpdated();
        }
        if ('clients' == $name) {
            return $this->getClients();
        }
        if ('codes' == $name) {
            return $this->getCodes();
        }
        if ('tokens' == $name) {
            return $this->getTokens();
        }

        throw new \InvalidArgumentException(sprintf('The data "%s" does not exists.', $name));
    }

    /**
     * Import data from an array.
     *
     * @param array $array An array.
     *
     * @return void
     */
    public function fromArray($array)
    {
        if (isset($array['id'])) {
            $this->setId($array['id']);
        }
        if (isset($array['username'])) {
            $this->setUsername($array['username']);
        }
        if (isset($array['email'])) {
            $this->setEmail($array['email']);
        }
        if (isset($array['salt'])) {
            $this->setSalt($array['salt']);
        }
        if (isset($array['password'])) {
            $this->setPassword($array['password']);
        }
        if (isset($array['created'])) {
            $this->setCreated($array['created']);
        }
        if (isset($array['updated'])) {
            $this->setUpdated($array['updated']);
        }
    }

    /**
     * Export the data to an array.
     *
     * @return array An array with the data.
     */
    public function toArray($withAssociations = true)
    {
        $array = array();

        $array['id'] = $this->get('id');
        $array['username'] = $this->get('username');
        $array['email'] = $this->get('email');
        $array['salt'] = $this->get('salt');
        $array['password'] = $this->get('password');
        $array['created'] = $this->get('created');
        $array['updated'] = $this->get('updated');

        return $array;
    }

    /**
     * Load the metadata.
     *
     * @param \Doctrine\ORM\Mapping\ClassMetadata $metadata The metadata class.
     */
    static public function loadMetadata(\Doctrine\ORM\Mapping\ClassMetadata $metadata)
    {
        $metadata->setChangeTrackingPolicy(\Doctrine\ORM\Mapping\ClassMetadata::CHANGETRACKING_DEFERRED_EXPLICIT);
        $metadata->setTableName('users');
        $metadata->setCustomRepositoryClass('BMurphy\Models\UserRepository');
        $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_AUTO);
        $metadata->mapField(array(
            'fieldName' => 'id',
            'type' => 'integer',
            'id' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'username',
            'type' => 'string',
            'length' => 255,
            'nullable' => false,
            'unique' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'email',
            'type' => 'string',
            'length' => 255,
            'nullable' => false,
            'unique' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'salt',
            'type' => 'string',
            'length' => 255,
            'unique' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'password',
            'type' => 'string',
            'unique' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'created',
            'type' => 'datetime',
            'nullable' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'updated',
            'type' => 'datetime',
            'nullable' => true,
        ));
        $metadata->mapOneToMany(array(
            'fieldName' => 'clients',
            'targetEntity' => 'BMurphy\\Models\\Client',
            'cascade' => array(
                0 => 'persist',
                1 => 'remove',
            ),
            'mappedBy' => 'user',
        ));
        $metadata->mapOneToMany(array(
            'fieldName' => 'codes',
            'targetEntity' => 'BMurphy\\Models\\Code',
            'cascade' => array(
                0 => 'persist',
                1 => 'remove',
            ),
            'mappedBy' => 'user',
        ));
        $metadata->mapOneToMany(array(
            'fieldName' => 'tokens',
            'targetEntity' => 'BMurphy\\Models\\AccessToken',
            'cascade' => array(
                0 => 'persist',
                1 => 'remove',
            ),
            'mappedBy' => 'user',
        ));
        $metadata->setLifecycleCallbacks(array(
            'prePersist' => array(
                0 => 'updateTimestampableCreated',
            ),
            'postPersist' => array(

            ),
            'preUpdate' => array(
                0 => 'updateTimestampableUpdated',
            ),
            'postUpdate' => array(

            ),
            'preRemove' => array(

            ),
            'postRemove' => array(

            ),
            'onFlush' => array(

            ),
            'postLoad' => array(

            ),
        ));
    }

    /**
     * Throws an \LogicException because you cannot check if data exists.
     *
     * @throws \LogicException
     */
    public function offsetExists($name)
    {
        throw new \LogicException('You cannot check if data exists in the entity.');
    }

    /**
     * Set data in the entity.
     *
     * @param string $name  The data name.
     * @param mixed  $value The value.
     *
     * @see set()
     */
    public function offsetSet($name, $value)
    {
        return $this->set($name, $value);
    }

    /**
     * Returns data of the entity.
     *
     * @param string $name The data name.
     *
     * @return mixed Some data.
     *
     * @see get()
     */
    public function offsetGet($name)
    {
        return $this->get($name);
    }

    /**
     * Throws a \LogicException because you cannot unset data in the entity.
     *
     * @throws \LogicException
     */
    public function offsetUnset($name)
    {
        throw new \LogicException('You cannot unset data in the entity.');
    }

    /**
     * Returns the entity manager.
     *
     * @return \Doctrine\ORM\EntityManager The entity manager.
     */
    static public function entityManager()
    {
        return \Doctrator\EntityManagerContainer::getEntityManager();
    }

    /**
     * Check if the entity manager is clear.
     *
     * @return void
     *
     * @throws \RuntimeException If the entity manager is not clear.
     */
    public function checkEntityManagerIsClear()
    {
        static $reflection;

        $unitOfWork = static::entityManager()->getUnitOfWork();

        if (null === $reflection) {
            $reflection = new \ReflectionProperty(get_class($unitOfWork), 'scheduledForDirtyCheck');
            $reflection->setAccessible(true);
        }

        if ($unitOfWork->hasPendingInsertions() || $reflection->getValue($unitOfWork) || $unitOfWork->getScheduledEntityDeletions()) {
            throw new \RuntimeException('The entity manager is not clear.');
        }
    }

    /**
     * Returns the repository.
     *
     * @return \Doctrine\ORM\EntityRepository The repository.
     */
    static public function repository()
    {
        return static::entityManager()->getRepository('BMurphy\Models\User');
    }

    /**
     * Create a query builder for this entity name.
     *
     * @param string $alias The alias.
     *
     * @return \Doctrine\ORM\QueryBuilder A query builder
     */
    static public function queryBuilder($alias)
    {
        return static::repository()->createQueryBuilder($alias);
    }

    /**
     * Returns if the entity is new.
     *
     * @return bool If the entity is new.
     */
    public function isNew()
    {
        return !static::entityManager()->getUnitOfWork()->isInIdentityMap($this);
    }

    /**
     * Throws an \RuntimeException if the entity is not new.
     */
    public function checkIsNew()
    {
        if (!$this->isNew()) {
            throw new \RuntimeException('The entity is not new.');
        }
    }

    /**
     * Throws an \RuntimeException if the entity is new.
     */
    public function checkIsNotNew()
    {
        if ($this->isNew()) {
            throw new \RuntimeException('The entity is new.');
        }
    }

    /**
     * Returns if the entity is modified.
     *
     * @return bool If the entity is modified.
     */
    public function isModified()
    {
        return (bool) count($this->getModified());
    }

    /**
     * Throws an \RuntimeException if the entity is not modified.
     */
    public function checkIsModified()
    {
        if (!$this->isModified()) {
            throw new \RuntimeException('The entity is not modified.');
        }
    }

    /**
     * Throws an \RuntimeException if the entity is modified.
     */
    public function checkIsNotModified()
    {
        if ($this->isModified()) {
            throw new \RuntimeException('The entity is modified.');
        }
    }

    /**
     * Returns the entity modifications
     *
     * @return array The entity modifications.
     */
    public function getModified()
    {
        if ($this->isNew()) {
            return array();
        }

        $originalData = static::entityManager()->getUnitOfWork()->getOriginalEntityData($this);

        return array_diff($originalData, $this->toArray());
    }

    /**
     * Refresh the entity from the database.
     *
     * @return void
     */
    public function refresh()
    {
        static::entityManager()->getUnitOfWork()->refresh($this);
    }

    /**
     * Returns the change set of the entity.
     *
     * @return array The change set.
     */
    public function changeSet()
    {
        return static::entityManager()->getUnitOfWork()->getEntityChangeSet($this);
    }

    /**
     * Save the entity.
     */
    public function save()
    {
        $this->checkEntityManagerIsClear();

        $em = static::entityManager();

        $em->persist($this);
        $em->flush();
    }

    /**
     * Delete the entity.
     */
    public function delete()
    {
        $this->checkEntityManagerIsClear();

        $em = static::entityManager();

        $em->remove($this);
        $em->flush();
    }

    public function updateTimestampableCreated()
    {
        $this->setCreated(new \DateTime());
    }

    public function updateTimestampableUpdated()
    {
        $this->setUpdated(new \DateTime());
    }
}